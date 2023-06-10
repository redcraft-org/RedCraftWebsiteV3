<div class="m-auto w-96">
    <form wire:submit.prevent="submit" class="m-auto" x-data="{ open: false }">
        <div class="relative">
            <input wire:model="searchTerm" type="text" name="searchTerm" id="searchTerm" x-on:click="open = true"
                x-on:click.away="open = false"
                class="p-2 duration-200 ease-linear transform bg-white border-b border-gray-300 rounded-t-lg text-base-100 w-96 p focus:outline-none focus:border-blue-500 focus:ring-0 transition-rounded"
                :class="open && {{ count($filteredPlayerList) > 0 ? 'true' : 'false' }} ? 'rounded-t-lg' : 'rounded-lg'"
                label="Search for a player" placeholder="Player name" />
            <div x-show="open" class="absolute z-10 origin-top bg-white rounded-b-lg shadow-lg w-96"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-y-50"
                x-transition:enter-end="opacity-100 transform scale-y-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-end="opacity-0 transform scale-y-50" x-on:transitionend="open = false">
                <ul class="p-0 m-0 bg-white rounded-b-lg {{ count($filteredPlayerList) > 0 ? 'pb-2' : '' }} overflow-y-auto"
                    x-data="{ focusedItem: null }">
                    @foreach ($filteredPlayerList as $player)
                        <li class="flex flex-col cursor-pointer over:shadow-xl"
                            wire:click="selectPlayer('{{ $player['uuid'] }}'); open = false" tabindex="0"
                            @focus="focusedItem = '{{ $player['uuid'] }}'" @blur="focusedItem = null"
                            :class="{ 'bg-gray-200': focusedItem === '{{ $player['uuid'] }}' }"
                            @keydown.enter="$wire.selectPlayer('{{ $player['uuid'] }}'); open = false">
                            <div class="flex flex-row p-1 hover:bg-light-gray">
                                <img src="{{ $player['headUrl'] }}" alt="{{ $player['uuid'] }}"
                                    class="w-8 h-8 rounded-lg shadow-lg" />
                                <div class="flex flex-col justify-center pl-2">
                                    <p class="text-sm font-bold text-base-100">
                                        {{ $player['name'] }}
                                    </p>
                                    <p class="text-xs text-base-200">
                                        {{ $player['uuid'] }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
            </div>
        </div>

    </form>

</div>
