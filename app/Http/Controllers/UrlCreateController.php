<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Url\UrlCreateRequest;
use App\Models\ShortUrl;


class UrlCreateController extends Controller
{
    public function getToken($len = 5, $charset = '0123456789abcdefghijklmnopqrstuvwxyz', $maxTries = 100)
    {
        $tries = 0;
        do {
            $token = substr(str_shuffle($charset), 0, $len);
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
        $token = $request->input('token', self::getToken());
        $shortUrl = ShortUrl::create([
            'token' =>  $token,
            'url' => $request->url,
        ]);
        $response = $shortUrl->toArray();
        $response['self_url'] = $shortUrl->selfUrl;
        return response()->json($response);
    }

}
