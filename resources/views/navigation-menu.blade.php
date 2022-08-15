@php

// Decide at what point the mobile menu should be displayed
$mobileSizeTrigger = 'sm';

// TODO translate navigation menu names
$links = [
    [
        'name' => 'Contact',
        'route' => 'contact',
    ],
    [
        'name' => 'Vote',
        'route' => 'vote',
    ],
    [
        'name' => 'Stats',
        'route' => 'stats',
    ],
    [
        'name' => 'Rules',
        'route' => 'rules',
    ],
];
@endphp

<nav x-data="{ mobileOpen: false }" class="mx-auto px-8 block border-none min-h-0 relative container md:max-w-screen-lg navbar">
    <div class="flex py-1 justify-between">
        <div>
            <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
            </x-jet-nav-link>
        </div>
        <div class="space-x-8 px-4 hidden <?= $mobileSizeTrigger ?>:flex">
            @foreach ($links as $link)
                <x-jet-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])">
                    {{ $link['name'] }}
                </x-jet-nav-link>
            @endforeach
        </div>

        {{-- <x-navbar-dropdown /> --}}

        <!-- Hamburger -->
        <div class="items-center z-20 flex <?= $mobileSizeTrigger ?>:hidden">
            <button @click="mobileOpen = ! mobileOpen"
                :class="{ 'fixed mr-8 right-0': mobileOpen, 'block': !mobileOpen }"
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': mobileOpen, 'inline-flex': !mobileOpen }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !mobileOpen, 'inline-flex': mobileOpen }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


    <!-- Mobile Menu -->
    <div id="mobile-menu-content" x-show="mobileOpen" x-cloak
        class="bg-base-200/90 backdrop-blur-sm drop-shadow-2xl fixed w-1/2 rounded-md right-8 top-4 z-10 py-4 flex <?= $mobileSizeTrigger ?>:hidden"
        x-transition:enter="transition out-expo duration-100" x-transition:enter-start="opacity-0 scale-90 translate-x-3.5 -translate-y-3.5"
        x-transition:enter-end="opacity-100 scale-100 translate-x-0 translate-y-0" x-transition:leave="transition in-expo duration-100"
        x-transition:leave-start="opacity-100 scale-100 translate-x-0 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-x-3.5 -translate-y-3.5">
        <div class="space-y-4 w-full">
            @foreach ($links as $link)
                <div class="block px-4">
                    <a href="{{ route($link['route']) }}">
                        {{ $link['name'] }}
                    </a>
                </div>
                @if (!$loop->last)
                    <hr class="text-base-100">
                @endif
            @endforeach
        </div>

    </div>
</nav>
