<link rel="stylesheet" href="css/home.css">

<x-app-layout>
    <x-section id="header">
        <div class="flex flex-row">
            <img src="/images/red_white_grey_none_none_296.png">
            <div>
                <h1>Bienvenue sur RedCraft !</h1>
                <p>Le retour de deux grandes communautés, TopRed et KingdomHills, à travers une toute nouvelle
                    infrastructure Open Source.<br>Partage et Innovation seront notre crédo ! </p>
            </div>
        </div>
        <div>
            <x-jet-button type="primary">Call to action Discord</x-jet-button>
            <x-jet-button type="secondary">Call to action IP</x-jet-button>
        </div>

    </x-section>

    <x-home.about-section />

    <x-section id="news" title="News">

    </x-section>
    <x-home.servers-section />
    <x-home.staff-section />

</x-app-layout>
