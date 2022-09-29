<div class="input-player-search">
    @once
        <link rel="stylesheet" href="{{ mix('css/player-search.css') }}">
    @endonce

    <input type="text" wire:model="search" wire:keydown.escape="resetSearch" wire:keydown.tab="selectPlayer"
        wire:keydown.arrow-up="decrHighlight" wire:keydown.arrow-down="incrHighlight" wire:keydown.enter="selectPlayer"
        class="input w-full">

    <div class="input-search-results">

        @if (!empty($search))
            @if (!empty($players))
                @foreach ($players as $i => $player)
                    <div class="item {{ $highlightIndex === $i ? 'highlight' : '' }}" wire:click="selectPlayer(0)">{{ $player }}</div>
                @endforeach
            @else
                <div class="item">Aucun résultat</div>
            @endif
        @else
            <div class="item">Recherchez un joueur</div>
        @endif

    </div>
</div>
