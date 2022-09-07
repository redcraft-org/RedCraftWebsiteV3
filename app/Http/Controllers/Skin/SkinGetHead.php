<?php

namespace App\Http\Controllers\Skin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkinGetHead extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $uuid = $request->uuid;
        $skin = SkinUtils::getHeadFromUUID($uuid);
        return response($skin, 200)->header('Content-Type', 'image/png');
    }
}
