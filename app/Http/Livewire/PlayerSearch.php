<?php

namespace App\Http\Livewire;

use App\Models\PlayerInfoProvider;
use Livewire\Component;

class PlayerSearch extends Component
{

    public $search = '';

    public function render()
    {
        return view('livewire.player-search', [
            'players' => PlayerInfoProvider::where('last_username', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}
