<?php

namespace App\Http\Controllers\PlayerMail;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerMailGet extends Controller
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
        $unreadOnly = in_array($request->unreadOnly, ['true','True', '1', 'on', 'yes', 'y', 'Y', 'Yes', 'On', 'TRUE']) ?? false;
        $player = Player::getPlayerByUuid($uuid);
        if (!$player) {
            return response()->json(['error' => 'Player not found'], 404);
        }
        if ($unreadOnly) {
            return response()->json($player->unreadMails, 200);
        }
        return response()->json($player->mails, 200);
    }
}
