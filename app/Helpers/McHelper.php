<?php

namespace App\Helpers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class McHelper
{
    public static function getVersions()
    {
        try {
            return Cache::remember('redcraft-bungee-json-api.endpoint.versions', config('services.redcraft-bungee-json-api.endpoint.versions-time'), function () {
                return Http::timeout(config('services.redcraft-bungee-json-api.endpoint.timeout'))->get(config('services.redcraft-bungee-json-api.endpoint.versions'))->json();
            });
        } catch (ConnectionException $e) {
            //TODO Log the error with sentry
            return -1;
        }
    }

    public static function getPlayers()
    {
        try {
            return Cache::remember('redcraft-bungee-json-api.endpoint.players', config('services.redcraft-bungee-json-api.endpoint.players-time'), function () {
                return Http::timeout(config('services.redcraft-bungee-json-api.endpoint.timeout'))->get(config('services.redcraft-bungee-json-api.endpoint.players'))->json();
            });
        } catch (ConnectionException $e) {
            //TODO Log the error with sentry
            return -1;
        }
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
