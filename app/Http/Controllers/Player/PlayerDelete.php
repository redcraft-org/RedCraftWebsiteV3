<?php

namespace App\Http\Controllers\Player;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerDelete extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($uuid)
    {
        $player = Player::getPlayerByUuid($uuid);
        if ($player) {
            $player->delete();
            return response()->json([
                'message' => 'Player deleted',
            ], 200);
        }
        return response()->json([
            'message' => 'Player not found',
        ], 404);

    }
}
