@php

    // TODO translate navigation menu names
    $links = [
        [
            'name' => __('nav.links.1'),
            'route' => 'contact',
        ],
        [
            'name' => __('nav.links.2'),
            'route' => 'vote',
        ],
        [
            'name' => __('nav.links.3'),
            'route' => 'stats',
        ],
        [
            'name' => __('nav.links.4'),
            'route' => 'rules',
        ],
    ];

    // config("app.locales")
    $langs = [
        'en' => 'English',
        'fr' => 'Français',
    ];

@endphp

<nav x-data="{ mobileOpen: false, languageOpen: false, languageMobile: false, ...mobileMenu }" class="mx-auto px-8 block border-none min-h-0 relative container md:max-w-screen-lg navbar">
    <div class="flex py-1 justify-between">
        <div>
            <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
            </x-jet-nav-link>
        </div>
        <div class="space-x-8 px-4 hidden lg:flex lg:h-12">
            @foreach ($links as $link)
                <x-jet-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])">
                    {{ $link['name'] }}
                </x-jet-nav-link>
            @endforeach

            <button @click="languageOpen=!languageOpen"
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 cursor-pointer nav-link z-20">
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
