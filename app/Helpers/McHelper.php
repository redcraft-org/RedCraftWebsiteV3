<?php

namespace App\Helpers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class McHelper
{
    /**
     * Always returns an array with a supportedVersions key, even when the api
     * is unreachable. Callers reset() and end() that list, and reset(null) is a
     * TypeError, so handing back a different shape on failure turned an api
     * timeout into a 500 on the about page.
     */
    public static function getVersions()
    {
        try {
            $versions = Cache::remember('redcraft-bungee-json-api.endpoint.versions', config('services.redcraft-bungee-json-api.endpoint.versions-time'), function () {
                return Http::timeout(config('services.redcraft-bungee-json-api.endpoint.timeout'))->get(config('services.redcraft-bungee-json-api.endpoint.versions'))->json();
            });
        } catch (ConnectionException $e) {
            $versions = null;
        }

        if (! is_array($versions) || ! is_array($versions['supportedVersions'] ?? null)) {
            return ['supportedVersions' => []];
        }

        return $versions;
    }

    /**
     * Same contract as getVersions: always an array with a players key. An
     * empty or non-json body makes ->json() return null, and countPlayers
     * reads ['players'] straight off it, so anything else here is a 500 on
     * the home page the moment the api answers with something unexpected.
     */
    public static function getPlayers()
    {
        try {
            $players = Cache::remember('redcraft-bungee-json-api.endpoint.players', config('services.redcraft-bungee-json-api.endpoint.players-time'), function () {
                return Http::timeout(config('services.redcraft-bungee-json-api.endpoint.timeout'))->get(config('services.redcraft-bungee-json-api.endpoint.players'))->json();
            });
        } catch (ConnectionException $e) {
            $players = null;
        }

        if (! is_array($players) || ! array_key_exists('players', $players)) {
            return ['players' => -1];
        }

        return $players;
    }

    public static function countPlayersConnected()
    {
        $players = McHelper::getPlayers()['players'];
        if (!is_array($players)) {
            return -1;
        }

        $playersCount = 0;

        foreach ($players as $server => $playersInServer) {
            $playersCount += count($playersInServer);
        }

        return $playersCount;
    }
}
