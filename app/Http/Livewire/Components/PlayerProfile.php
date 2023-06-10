<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PlayerProfile extends Component
{
    public $playerUUID;
    public $playerData;

    protected $listeners = ['playerSelected' => 'updateSelectedUUID'];



    public function updatePlayerStats($uuid)
    {
        $playerStats = Cache::remember('playerStats_' . $uuid, 3600, function () use ($uuid) {
            $response = Http::get('https://plan.redcraft.org/v1/player?player=' . $uuid);
            if ($response->failed()) {
                $this->playerList = [];
                return;
            }
            return $response->json();
        });
        $this->playerData = $playerStats['info'];
        dd($this->playerData);
    }


    public function mount()
    {
        $this->playerUUID = null;
        $this->playerData = [];
    }
    public function render()
    {
        return view('livewire.components.player-profile');
    }

    public function updateSelectedUUID($uuid)
    {
        $this->playerUUID = $uuid;
        $this->updatePlayerStats($uuid);
    }
}
