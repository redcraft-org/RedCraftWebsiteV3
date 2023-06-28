@php

    $links = [
        [
            'type' => 'route',
            'name' => __('nav.links.1'),
            'link' => 'contact',
        ],
        [
            'type' => 'route',
            'name' => __('nav.links.2'),
            'link' => 'vote',
        ],
        [
            'type' => 'blank',
            'name' => __('nav.links.5'),
            'link' => config('services.bluemap-url'),
        ],
        [
            'type' => 'blank',
            'name' => __('nav.links.3'),
            'link' => config('services.plan-url'),
        ],
        [
            'type' => 'route',
            'name' => __('nav.links.4'),
            'link' => 'rules',
        ],

    ];

    $langs = config('app.locales');

@endphp

<nav x-data="{ mobileOpen: false, languageOpen: false, languageMobile: false, ...mobileMenu }" class="container relative block min-h-0 px-8 mx-auto border-none md:max-w-screen-lg navbar">
    <div class="flex justify-between py-1">
        <div>
            <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
            </x-jet-nav-link>
        </div>
        <div class="hidden px-4 space-x-8 lg:flex lg:h-12">
            @foreach ($links as $link)
                @if ($link['type'] == 'route')
                    <x-jet-nav-link :href="route($link['link'])" :active="request()->routeIs($link['link'])">
                        {{ $link['name'] }}
                    </x-jet-nav-link>
                @elseif ($link['type'] == 'blank')
                    <x-jet-nav-link :href="$link['link']" target="_blank">
                        {{ $link['name'] }}
                    </x-jet-nav-link>
                @endif

            @endforeach

            <button @click="languageOpen=!languageOpen"
                class="z-20 inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md cursor-pointer hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 nav-link">
                <i class="fa-sharp fa-solid fa-earth-americas" x-show="!languageOpen"></i>
                <i class="fa-solid fa-xmark" x-show="languageOpen" x-cloak></i>
            </button>

        </div>


        <x-navbar.language-dropdown :langs="$langs" />

        <x-navbar.mobile-nav :links="$links" />
    </div>


</nav>


@once
    @push('scripts')
        <script>
            window.mobileMenu = {
                hamburgerClick() {
                    if (this.languageMobile) {
                        this.languageMobile = false;
                        this.languageOpen = false;
                    }
                    this.mobileOpen = !this.mobileOpen;
                }
            }
        </script>
    @endpush
@endonce
