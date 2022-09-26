<div>
    <input type="text" name="" wire:model="search">
    <div>
        @foreach ($players as $player)
            <div>{{ $player->name; }}</div>
        @endforeach
    </div>
</div>
