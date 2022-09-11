<?php

namespace App\Http\Controllers\Skin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Skin\SkinUtils;

class SkinGetIsometric extends Controller
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
        $skin = SkinUtils::getIsometricFromUUID($uuid);
        return response($skin, 200)->header('Content-Type', 'image/png');
    }
}
