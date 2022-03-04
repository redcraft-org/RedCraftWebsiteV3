<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $shortened)
    {
        $shortUrl = ShortUrl::where('shortened_url', $shortened)->first();
        if(!$shortUrl) {
            return redirect()->to('/');
        }
        return redirect()->to($shortUrl->url);
    }
}
