<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PlayerSearch extends Component
{
    public $playerList;
    public $selectedPlayerUUID;

    public $searchTerm;
    public $filteredPlayerList;

    const UUID_REGEX = '/[0-9a-f]{8}-([0-9a-f]{4}-){3}[0-9a-f]{12}/';
    const USERNAME_REGEX = '/(?<=\>)(.*?)(?=\<)/';
    const PLAYER_LIST_LIMIT = 5;

    public function getPlayerList()
    {
        $playerList = Cache::remember('playerList', 60, function () {
            $response = Http::get('https://plan.redcraft.org/v1/players');
            if ($response->failed()) {
                $this->playerList = [];
                return;
            }

            $json = $response->json();
            $data = $json['data'] ?? null;
            if (!is_array($data)) {
                $this->playerList = [];
                return;
            }
            $playerLinks = array_map(function ($player) {
                return $player['name'];
            }, $data);
            return array_map(function ($link) {
                $uuid = null;
                $username = null;
                preg_match(self::UUID_REGEX, $link, $uuid);
                preg_match(self::USERNAME_REGEX, $link, $username);
                return [
                    'name' => $username[0],
                    'uuid' => $uuid[0],
                    'headUrl' => $this->getPlayerHeadUrl($uuid[0]),
                ];
            }, $playerLinks);
        });
        return $playerList;

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

        $this->playerList = $this->getPlayerList();
        $this->filteredPlayerList = $this->getFilteredPlayerList();
    }

    public function render()
    {
        return view('livewire.components.player-search');
    }

    public function selectPlayer($uuid)
    {
        $this->selectedPlayerUUID = $uuid;
        $this->emit('playerSelected', $uuid);
    }
}
