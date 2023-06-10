<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PlayerProfile extends Component
{
    public $uuid;
    public $playerStats;

    public function getPlayerStats($uuid)
    {
        $playerStats = Cache::remember('playerStats_' . $uuid, 60, function () use ($uuid) {
            $response = Http::get('https://plan.redcraft.org/v1/player?player=' . $uuid);
            if ($response->failed()) {
                $this->playerStats = [];
                return;
            }
            return $response->json();
        });

        return $playerStats;

    }

    public function getPlayerHeadUrl($uuid)
    {
        $url = 'https://mc-heads.net/avatar/' . $uuid;
        return $url;
    }




    public function getFilteredPlayerList()
    {
        $filteredUUIDS = array_filter($this->playerList, function ($player) {
            return str_contains(strtolower($player['name']), strtolower($this->searchTerm));
        });
        $filteredPlayerList = array_slice($filteredUUIDS, 0, self::PLAYER_LIST_LIMIT);
        return $filteredPlayerList;
    }



    public function updatedSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
        $this->filteredPlayerList = $this->getFilteredPlayerList();
        $this->emitSelf('searchTermUpdated');
    }

    public function mount()
    {

        info('a');
        $this->playerList = $this->getPlayerList();
        info('b');
        $this->filteredPlayerList = $this->getFilteredPlayerList();
        info('c');
    }

    public function render()
    {
        return view('livewire.components.player-profile');
    }
}
