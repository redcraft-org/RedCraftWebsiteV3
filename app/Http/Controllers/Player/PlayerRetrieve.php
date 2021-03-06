<?php

namespace App\Http\Controllers\Player;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerRetrieve extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $uuid)
    {
        $isProvider = $request->has('is-provider');
        $player = Player::getPlayerByUuid($uuid, $isProvider);
        if ($player) {
            return response()->json(json_decode($player->toJson()), 200);
        }
        return response()->json(['error' => 'Player not found'], 404);
    }
}
