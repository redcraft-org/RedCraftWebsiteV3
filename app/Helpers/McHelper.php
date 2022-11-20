<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class McHelper
{

    public static function getVersions()
    {
        return Cache::remember('redcraft-bungee-json-api.endpoint.versions', config('redcraft-bungee-json-api.endpoint.time'), function () {
            return Http::get(config('services.redcraft-bungee-json-api.endpoint.versions'))->json();
        });
    }

    public static function shout(string $string)
    {
        return strtoupper($string);
    }
}
