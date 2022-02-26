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
        $providers = Arr::get($request->validated(), 'providers');
        $provider_uuids = array_column($providers, 'uuid');
        $player = Player::getTrashedPlayerByProviderUuids($provider_uuids);
        if ($player) {
            $player->restore();
            return response()->json(json_decode($player->toJson()), 200);
        }


        $player = Player::create([
            'email' => Arr::get($request->validated(), 'email')
        ]);

        $main_language = Language::getIdFromCode($request->validated('main_language'));
        $player->languagesTrait()->attach($main_language, ['is_main_language' => true]);
        $language_list = Language::whereIn('code', Arr::get($request->validated(), 'languages'))->pluck('id');
        //  TODO check with lulu if we should return an error if the language is not found
        if ($language_list->contains($main_language)) {
            $language_list = $language_list->diff([$main_language]);

        }
        $player->languagesTrait()->attach($language_list);


        $providers = Arr::get($request->validated(), 'providers', []);
        foreach ($providers as $provider) {
            $providerId = Provider::where('name', $provider["provider_name"])->first()->id;
            $player->playerInfoProviders()->create([
                'provider_id' => $providerId,
                'provider_uuid' => $provider['uuid'],
                'last_username' => $provider['last_username'],
                'previous_username' => $provider['previous_username'] ?? null,
            ]);
        }
        $player->save();
        return response()->json(json_decode($player->toJson()), 201);
    }
}
