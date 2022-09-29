<div class="input-player-search" x-data="{ showDropdown: @entangle('showDropdown'), disabled: @entangle('disabled') }">
    @once
        <link rel="stylesheet" href="{{ mix('css/player-search.css') }}">
    @endonce

    <input type="text" wire:model="search" wire:keydown.escape="resetSearch" wire:keydown.tab="selectPlayer"
        wire:keydown.arrow-up="decrHighlight" wire:keydown.arrow-down="incrHighlight" wire:keydown.enter="selectPlayer"
        class="input w-full" :disabled="disabled" placeholder="Rechercher un joueur">

    <div class="input-search-results" x-show="showDropdown" @click.outside="showDropdown = false" x-cloak>

        @if (!empty($search))
            @if (!empty($players))
                @foreach ($players as $i => $player)
                    <div class="item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                        wire:click="selectPlayer({{ $i }})">{{ $player }}</div>
                @endforeach
            @else
                <div class="item">Aucun résultat</div>
            @endif
        @else
            <div class="item">Recherchez un joueur</div>
        @endif

    </div>
</div>
