<x-section id="header" title="">

    {{-- Welcome header --}}

    <div class="flex flex-col sm:flex-row pb-12 gap-8">

        {{-- animated logo --}}
        <div class="sm:w-1/2 h-fit flex justify-center my-auto">
            <img src="{{ asset('images/home/rc-logo-animated.gif') }}">
        </div>

        <div class="sm:w-1/2 flex flex-col justify-center">
            <h1>Bienvenue sur RedCraft !</h1>
            <p>Le retour de deux grandes communautés, TopRed et KingdomHills, à travers une toute nouvelle
                infrastructure Open Source.<br>Partage et Innovation seront notre crédo ! </p>
        </div>
    </div>

    {{-- Call to action buttons --}}

    <div class="flex flex-wrap justify-center gap-3">
        <button class="btn btn-lg btn-primary flex flex-col gap-5">
            <div>
                <div class="text-xl">Rejoindre le <b>serveur</b></div>
                <div class="text-sm">69 joueurs en ligne</div>
            </div>
            <div class="text-sm">Adresse IP copiée !</div>
        </button>
        <a class="btn btn-lg btn-secondary flex flex-col gap-5" href="https://discord.gg/xkWE4uJ" target="_blank">
            <div>
                <div class="text-xl">Rejoindre le <b>Discord</b></div>
                <div class="text-sm">420 joueurs connectés</div>
            </div>
        </a>
    </div>
</x-section>
