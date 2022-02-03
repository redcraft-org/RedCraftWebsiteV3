<?php

namespace App\Http\Controllers\Player;

use App\Models\Player;
use App\Models\Language;
use App\Models\Provider;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
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
        $player = Player::create([
            'email' => Arr::get($request->validated(), 'email')
        ]);

        $player->languages()->attach(Language::getIdFromCode($request->validated('main_language')), ['is_main_language' => true]);

        $player->languages()->attach(Language::whereIn('code', Arr::get($request->validated(), 'languages'))->pluck('id'));

        foreach (Arr::get($request->validated(), 'providers', []) as $provider) {
            $providerId = Provider::where('name', Arr::get($request->validated(), 'providers.0.provider_name'))->first()->id;
            $player->playerInfoProviders()->create([
                'provider_id' => $providerId,
                'provider_uuid' => $provider['uuid'],
                'last_username' => $provider['last_username'],
                'previous_username' => $provider['previous_username'] ?? null,
            ]);
        }

        return response()->json($player->save(), 201);
    }
}
