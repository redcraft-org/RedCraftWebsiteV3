<?php

namespace App\Http\Livewire;

use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PlayerSearchResults extends Component
{
    private $search = '';
    public $highlightIndex = 0;
    public $results = [];
    public $providers = [];
    public $name = '';

    // entangled values with the frontend
    public $showDropdown = false;

    public function mount($providers, $name)
    {
        if (!$providers)
            $this->providers = Provider::all()->pluck('name')->toArray();
        else
            $this->providers = $providers;

        $this->name = $name;
    }

    protected function getListeners()
    {
        return ['PlayerSearchResults:' . $this->name => 'updateSearch'];
    }

    public function incrHighlight()
    {
        if ($this->highlightIndex >= count($this->results) - 1)
            $this->highlightIndex = 0;
        else
            $this->highlightIndex++;

    }

    public function decrHighlight()
    {
        if ($this->highlightIndex < 1)
            $this->highlightIndex = count($this->results) - 1;
        else
            $this->highlightIndex--;
    }

    public function selectPlayer($index = null)
    {
        if (!count($this->results)) {
            $this->search = '';
            return;
        }

        if ($index === null) $index = $this->highlightIndex;
        $this->search = $this->results[$index];
        $this->showDropdown = false;
    }

    public function updateSearch($search)
    {
        $this->results = DB::table('player_info_providers')
            ->join('providers', 'player_info_providers.provider_id', '=', 'providers.id')
            ->where('last_username', 'like', '%' . $search . '%')
            ->whereIn('providers.name', $this->providers)
            ->pluck('last_username')
            ->toArray();
        $this->showDropdown = true;
    }


    public function render()
    {
        return view('livewire.player-search-results');
    }
}
