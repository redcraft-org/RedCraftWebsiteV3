<?php

namespace App\Http\Livewire;

use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PlayerSearch extends Component
{

    public $search = '';
    public $highlightIndex = 0;
    public $results = [];
    public $providerss = [];

    public function mount($providers)
    {
        if ($providers) {
            $this->providerss = $providers;
            return;
        }
        $this->providerss = Provider::all()->pluck('name')->toArray();
    }

    public function resetSearch() {
        $this->search = '';
        $this->highlightIndex = 0;
        $this->results = [];
    }

    public function incrHighlight()
    {
        if ($this->highlightIndex >= count($this->results) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrHighlight()
    {
        if ($this->highlightIndex < 1) {
            $this->highlightIndex = count($this->results) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectPlayer()
    {
        if (!count($this->results)) {
            $this->search = '';
            return;
        }
        $this->search = $this->results[$this->highlightIndex];
    }

    public function updatedSearch()
    {
        $this->results = DB::table('player_info_providers')
            ->join('providers', 'player_info_providers.provider_id', '=', 'providers.id')
            ->where('last_username', 'like', '%' . $this->search . '%')
            ->whereIn('providers.name', $this->providerss)
            ->pluck('last_username')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.player-search', [
            'players' => $this->results
        ]);
    }
}
