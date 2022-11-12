@php

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

$lang = app()->getLocale();
$availableLangs = config('app.available_locales');
dd($availableLangs);

@endphp

<nav x-data="{ mobileOpen: false }" class="mx-auto px-8 block border-none min-h-0 relative container md:max-w-screen-lg navbar">
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
            <i class="fa-sharp fa-solid fa-earth-americas nav-link cursor-pointer"></i>
        </div>

        <!-- Hamburger -->
        <div class="items-center z-20 flex lg:hidden">
            <button @click="mobileOpen = ! mobileOpen"
                :class="{ 'absolute mr-8 right-0': mobileOpen, 'block': !mobileOpen }"
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    {{-- Hamburger --}}
                    <path x-show="!mobileOpen" class="inline-flex origin-center" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -rotate-45" x-transition:enter-end="opacity-100 rotate-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 -rotate-45" />
                    {{-- Cross --}}
                    <path x-show="mobileOpen" class="inline-flex origin-center" x-cloak stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"
                        x-transition:enter="transition ease-in duration-200"
                        x-transition:enter-start="opacity-0 rotate-45" x-transition:enter-end="opacity-100 rotate-0"
                        x-transition:leave="transition ease-out duration-200"
                        x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 rotate-45" />
                </svg>
            </button>
        </div>
    </div>


    <!-- Mobile Menu -->
    <div id="mobile-menu-content" x-show="mobileOpen" x-cloak
        class="bg-base-200/90 backdrop-blur-lg drop-shadow-lg absolute w-1/2 max-w-xs rounded-md right-6 top-2 z-10 py-4 flex lg:hidden"
        x-transition:enter="transition out-expo duration-100"
        x-transition:enter-start="opacity-0 scale-90 translate-x-3.5 -translate-y-3"
        x-transition:enter-end="opacity-100 scale-100 translate-x-0 translate-y-0"
        x-transition:leave="transition in-expo duration-100"
        x-transition:leave-start="opacity-100 scale-100 translate-x-0 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-x-3.5 -translate-y-3">
        <div class="space-y-4 w-full">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" class="text-white hover:text-white no-underline block px-4">
                    {{ $link['name'] }}
                </a>
                @if (!$loop->last)
                    <hr class="text-base-100">
                @endif
            @endforeach
        </div>

    </div>
</nav>
