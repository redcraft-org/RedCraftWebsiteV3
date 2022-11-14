@php
$links = [
    [
        'name' => __('footer.links.1'),
        'route' => 'home',
    ],
    [
        'name' => __('footer.links.2'),
        'route' => 'about',
    ],
    [
        'name' => __('footer.links.3'),
        'route' => 'contact',
    ],
];
@endphp

<x-section class="pb-32" bg="bg-base-200" text="text-light" wave-bg="fill-base-200" wave-id="6">
    <div class="flex md:flex-row flex-col">
        <div class="md:w-1/2 flex items-center mx-auto pb-4 md:pb-0">
            <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
            </x-jet-nav-link>
        </div>
        <div class="md:w-1/2 flex flex-col">
            <p class="pb-4">@lang('footer.description')</p>
            <div class="flex justify-between">
                @foreach ($links as $link)
                    <x-jet-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])">
                        {{ $link['name'] }}
                    </x-jet-nav-link>
                @endforeach
            </div>
        </div>
    </div>
</x-section>
