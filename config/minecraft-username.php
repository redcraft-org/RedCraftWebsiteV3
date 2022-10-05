<?php
return [
    'cache' => [
        'uuid' => [
            'time' => env('MINECRAFT_USERNAME_UUID_CACHE_TIME', 60),
        ],
        'profile' => [
            'time' => env('MINECRAFT_USERNAME_PROFILE_CACHE_TIME', 60),
        ],
    ],
];
