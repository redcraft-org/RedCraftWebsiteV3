<button x-data="{ show: false, ...ctaAnimate }" class="flex flex-col gap-5 btn btn-lg btn-primary"
    x-on:click="$clipboard('play.redcraft.org'); ctaIpCopy();">
    <div :class="show ? 'invisible' : ''" x-transition>
        <div class="text-xl">@lang('home.join.join') <b>@lang('home.join.server')</b></div>
        <div class="text-sm">@lang("home.join.players_online", ['count' => 69])</div>
    </div>
    <div class="absolute text-sm" x-show="show" x-transition x-cloak>Adresse IP copiée !</div>
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
