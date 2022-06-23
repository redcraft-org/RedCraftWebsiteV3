<x-section id="header" title="">
    <div class="flex flex-col sm:flex-row pb-12 gap-8">

        {{-- RedCraft animated logo --}}
        <div class="sm:w-1/2 h-fit flex justify-center my-auto">
            <img src="{{ asset('images/home/rc-logo-animated.gif'); }}">
        </div>

        <div class="sm:w-1/2 flex flex-col justify-center">
            <h1>Bienvenue sur RedCraft !</h1>
            <p>Le retour de deux grandes communautés, TopRed et KingdomHills, à travers une toute nouvelle
                infrastructure Open Source.<br>Partage et Innovation seront notre crédo ! </p>
        </div>
    </div>
    <div class="flex flex-wrap justify-center gap-3">
        <x-jet-button type="btn-primary">Call to action IP</x-jet-button>
        <x-jet-button type="btn-secondary">Call to action Discord</x-jet-button>
    </div>
</x-section>
