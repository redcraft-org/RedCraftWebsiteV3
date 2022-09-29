<div x-data="{ showDropdown: @entangle('showDropdown') }">
    <div class="player-search-results" x-show="showDropdown" @click.outside="showDropdown = false" x-cloak>

        @once
            <link rel="stylesheet" href="{{ mix('css/player-search-results.css') }}">
        @endonce

        @if (!empty($search))
            @if (!empty($players))

                {{ $players }}

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
