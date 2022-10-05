<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Validator;

class UsernameProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($username)
    {
        $validator = Validator::make(['username' => $username], [
            'username' => 'required|string|min:3|max:16|regex:/^[a-zA-Z0-9_]+$/',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'message' => 'Invalid username',
                'errors' => $errors,
            ], 400);
        }
        $player = Cache::remember('username_profile_' . $username, config('minecraft-username.cache.profile.time'),function () use ($username) {
            $minecraftProviderId = Provider::getIdFromName('minecraft');
            $player = Player::whereHas('playerInfoProviders', function ($query) use ($username, $minecraftProviderId) {
                $query->where('provider_id', $minecraftProviderId)
                    ->where('last_username', $username);
            })->first();
            return $player;
        });
        if (!$player) {
            return response()->json([
                'message' => 'Player not found',
            ], 404);
        }
        return response()->json(json_decode($player->toJson()), 200);

    }
}
