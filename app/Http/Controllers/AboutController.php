<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{

    public function getVersions() {
        return Cache::remember('redcraft-bungee-json-api.endpoint.versions', 900, function () {
            return Http::get(config('services.redcraft-bungee-json-api.endpoint.versions'))->json();
        });
    }

    public function __invoke()
    {
        return view('about', [
            'versions' => $this->getVersions()
        ]);
    }
}
