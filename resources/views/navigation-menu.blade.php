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
        class="fixed w-full h-screen left-0 top-0 z-10 items-center justify-center flex <?= $mobileSizeTrigger ?>:hidden"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-125"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-125">
        <div class="pt-2 pb-3 space-y-4">
            @foreach ($links as $link)
                <h4 class="block">
                    <a href="{{ route($link['route']) }}">
                        {{ $link['name'] }}
                    </a>
                </h4>
            @endforeach
        </div>

    </div>
</nav>


@push('scripts')
    <script>
        // JS here
    </script>
@endpush
