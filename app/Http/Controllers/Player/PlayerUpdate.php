<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Player\PlayerUpdateRequest;
use App\Models\Language;
use App\Models\Player;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PlayerUpdate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PlayerUpdateRequest $request)
    {
        $player = Player::getPlayerByUuid($request->uuid);
        if (!$player) {
            return response()->json(['error' => 'Player not found'], 404);
        }
        if (Arr::has($request->validated(), 'email')) {
            $player->update([
                'email' => Arr::get($request->validated(), 'email'),
            ]);
        }

        $languages = [];
        $language_list = [];
        if (Arr::has($request->validated(), 'languages')) {
            $language_list = Language::whereIn('code', Arr::get($request->validated(), 'languages'))->pluck('id');
        }
        if (Arr::has($request->validated(), 'main_language')) {
            $main_language_id = Language::getIdFromCode(Arr::get($request->validated(), 'main_language'));
            $languages = [$main_language_id => ['is_main_language' => true]];
            foreach ($language_list as $language) {
                $languages[$language] = ['is_main_language' => $language == $main_language_id];
            }
        }
        if (!empty($languages)) {
            $player->languagesTrait()->sync($languages);
        }
        if (Arr::has($request->validated(), 'providers')) {
            $providers = Arr::get($request->validated(), 'providers', []);
            foreach ($providers as $provider) {
                $providerId = Provider::where('name', $provider["provider_name"])->first()->id;
                $player->playerInfoProviders()->updateOrCreate([
                    'provider_id' => $providerId,
                    'provider_uuid' => $provider['uuid'],
                ], [
                    'last_username' => $provider['last_username'],
                    'previous_username' => $provider['previous_username'] ?? null,
                ]);
            }
        }
        $player->save();
        return response()->json(json_decode($player->toJson()), 200);
    }
}
