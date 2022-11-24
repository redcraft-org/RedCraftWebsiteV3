<?php

namespace App\Helpers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DiscordHelper
{

    public static function getPlayersConnected()
    {
        try {
            $discordInfo = Cache::remember('discord-json-api', config('services.discord-json-api-time'), function () {
                return Http::get(config('services.discord.json-api'))->json();
            });
        } catch (ConnectionException $e) {
            //TODO Log the error with sentry
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
