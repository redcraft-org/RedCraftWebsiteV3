<?php

$nbPlayersConnected = McHelper::countPlayersConnected();

?>

<button x-data="{ show: false, ...ctaAnimate }" class="flex flex-col gap-5 btn btn-lg btn-primary"
    x-on:click="$clipboard('redcraft.org'); ctaIpCopy();">
    <div :class="show ? 'invisible' : ''" x-transition>
        <div class="text-xl">@lang('home.join.join') <b>@lang('home.join.server')</b></div>
        @if ($nbPlayersConnected >= 0)
            <div class="text-sm">@lang('home.join.players_connected', ['count' => $nbPlayersConnected])</div>
        @endif
    </div>
    <div class="absolute text-sm" x-show="show" x-transition x-cloak>@lang('home.join.ip_copied')</div>
</button>

@once
    @push('scripts')
        <script>
            window.ctaAnimate = {
                ctaIpCopy() {
                    this.show = true;
                    setTimeout(() => {
                        this.show = false;
                    }, 3000);
                }
            }
        </script>
    @endpush
@endonce
