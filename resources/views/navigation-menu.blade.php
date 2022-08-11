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
        'name' => 'Stats',
        'route' => 'stats',
    ],
    [
        'name' => 'Stats',
        'route' => 'stats',
    ],
    [
        'name' => 'Rules',
        'route' => 'rules',
    ],
    [
        'name' => 'Rulesasdasd',
        'route' => 'rules',
    ],
];
@endphp



<nav x-data="{ open: false }">
    <div class="mx-auto px-8 container md:max-w-screen-lg navbar">
        <div class="flex py-1 justify-between">
            <div class="hidden sm:flex">
                <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 px-4 sm:flex">
                @foreach ($links as $link)
                    <x-jet-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])">
                        {{ $link['name'] }}
                    </x-jet-nav-link>
                @endforeach
            </div>

            <x-navbar-dropdown/>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

    </div>
</nav>


@push('scripts')
    <script>
        // JS here
    </script>
@endpush
