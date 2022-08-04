<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Url\UrlCreateRequest;

class UrlCreateController extends Controller
{
    public function getToken($len = 5, $charset = '0123456789abcdefghijklmnopqrstuvwxyz', $maxTries = 100)
    {
        $tries = 0;
        $charsetLength = strlen($charset);
        do {
            $token = "";
            for ($i = 0; $i < $len; $i++) {
                $token .= $charset[random_int(0, $charsetLength - 1)];
            }
            if  ($tries++ > $maxTries) {
                throw new \Exception('Could not generate a unique token.');
            }
        } while (ShortUrl::where('token', $token)->exists());
        return $token;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UrlCreateRequest $request)
    {
        $token = $request->input('token');
        if (!$token) {
            $shortUrl = Cache::remember('short_url_' . $request->input('url'), 600, function () use ($request) {
                return ShortUrl::where('url', $request->input('url'))->first();
            });
            if ($shortUrl) {
                return response()->json($shortUrl->toArray(), Response::HTTP_OK);
            }
            $token = $this->getToken();
        }
        $shortUrl = ShortUrl::create([
            'token' =>  $token,
            'url' => $request->url,
        ]);
        return response()->json($shortUrl->toArray(), Response::HTTP_CREATED);
    }

}
