<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class UsernameUuid extends Controller
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
        $uuid = Cache::remember('username_uuid_' . $username, config('minecraft-username.cache.uuid.time'), function () use ($username) {
            // call the Mojang API to get the UUID
            $url = 'https://api.mojang.com/users/profiles/minecraft/' . $username;
            $response = Http::get($url);
            if ($response->status() === 200) {
                $data = json_decode($response->body());
                return $data->id;
            }
            return null;
        });
        if (!$uuid) {
            return response()->json([
                'message' => 'Player not found',
            ], 404);
        }
        return response()->json([
            'uuid' => $uuid,
        ], 200);
    }
}
