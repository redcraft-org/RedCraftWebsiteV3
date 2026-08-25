<?php

namespace App\Helpers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DiscordHelper
{

    public static function getPlayersConnected()
    {
        $endpoint = config('services.discord.json-api');

        // No default for this one, so an install that has not set it would hand
        // Http::get a null and take the home page down with a TypeError. -1 is
        // the same "unknown" the header already knows how to hide.
        if (!$endpoint) {
            return -1;
        }

        try {
            $discordInfo = Cache::remember('discord-json-api', config('services.discord.json-api-time'), function () use ($endpoint) {
                return Http::get($endpoint)->json();
            });
        } catch (ConnectionException $e) {
            //TODO Log the error with sentry
            return -1;
        }

        if (!isset($discordInfo['members'])) {
            return -1;
        }
        $members = $discordInfo['members'];
        $membersCount = 1;
        foreach ($members as $member) {
            if ($member['status'] != 'offline') {
                $membersCount++;
            }
        }

        return $membersCount;
    }

    public static function getInviteUrl()
    {
        return config('services.discord.invite-url');
    }
}
