<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'redcraft-bungee-json-api' => [
        'endpoint' => [
            'versions' => env('REDCRAFT_BUNGEE_JSON_API_ENDPOINT_VERSIONS', 'http://localhost:25580/versions.json'),
            'players' => env('REDCRAFT_BUNGEE_JSON_API_ENDPOINT_PLAYERS', 'http://localhost:25580/players.json'),
            'versions-time' => env('REDCRAFT_BUNGEE_JSON_API_ENDPOINT_VERSIONS_TIME', 900),
            'players-time' => env('REDCRAFT_BUNGEE_JSON_API_ENDPOINT_PLAYERS_TIME', 15),
            'timeout' => env('REDCRAFT_BUNGEE_JSON_API_TIMEOUT', 3),
        ],
    ],
    'discord' => [
        'invite-url' => env('DISCORD_INVITE_URL', 'https://discord.gg/xkWE4uJ'),
        'json-api' => env('DISCORD_JSON_API'),
        'json-api-time' => env('DISCORD_JSON_API_TIME', 15),
    ],
    'plan-url' => env('PLAN_URL', 'https://stats.redcraft.org'),
    'github-organization-url' => env('GITHUB_ORGANIZATION_URL', 'https://github.com/redcraft-org'),

];
