<?php

namespace App\Http\Controllers\Player;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Player\PlayerCreateRequest;

class PlayerCreate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  PlayerCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PlayerCreateRequest $request)
    {
        foreach($request->all() as $key => $value) {
            info("{$key} => {$value}");
        }
    }
}
