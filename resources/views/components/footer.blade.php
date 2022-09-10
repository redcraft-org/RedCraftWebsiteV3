@php
$links = [
    [
        'name' => 'Accueil',
        'route' => 'home',
    ],
    [
        'name' => 'À propos',
        'route' => 'about',
    ],
    [
        'name' => 'Contact',
        'route' => 'contact',
],
];
@endphp

<footer class="section flex flex-col py-12">
    <div class="mx-auto px-8 container md:max-w-screen-lg">
        <div class="flex flex-row">
            <div>
                <x-jet-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    <img id="rc-logo-homepage" src="{{ asset('images/inline_org_color.png') }}">
                </x-jet-nav-link>
                <p>Une toute nouvelle expérience Minecraft multilingue avec une infrastructure open source de serveurs
                    créatif et survie soigneusement conçus.</p>
            </div>
            <div>
                @foreach ($links as $link)
                    <x-jet-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])">
                        {{ $link['name'] }}
                    </x-jet-nav-link>
                @endforeach
            </div>
        </div>
    </div>
</footer>
