<?php

namespace App\Http\Controllers\PlayerMail;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerMail\PlayerMailUpdateRequest;
use Illuminate\Http\Request;

class PlayerMailUpdate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PlayerMailUpdateRequest $request, PlayerMail $playerMail)
    {
        $playerMail->update($request->validated());
        return response()->json(json_decode($playerMail->toJson()), 200);
    }
}
