<x-section id="header" title="">

    {{-- Welcome header --}}

    <div class="flex flex-col gap-8 pb-12 sm:flex-row">

        {{-- animated logo --}}
        <div class="flex justify-center my-auto sm:w-1/2 h-fit">
            <img src="{{ asset('images/home/rc-logo-animated.gif') }}">
        </div>

        <div class="flex flex-col justify-center sm:w-1/2">
            <h1>@lang('home.title.welcome_to')</h1><span class="text-6xl">RedCraft !</span></h1>
            <p>@lang('home.title.sub')</p>
            <b>@lang('home.title.version', ['version' => "1.x - 1.x"])</b>
        </div>
    </div>

    {{-- Call to action buttons --}}

    <div class="flex flex-wrap justify-center gap-3">

        <x-home.ctaIpCopy></x-home.ctaIpCopy>

        <a class="flex flex-col gap-5 btn btn-lg btn-secondary" href="https://discord.gg/xkWE4uJ" target="_blank">
            <div>
                <div class="text-xl">@lang('home.join.join')<b> @lang('home.join.discord')</b></div>
                <div class="text-sm">@lang('home.join.players_connected', ['count' => 69])</div>
            </div>
        </a>

    </div>
</x-section>
