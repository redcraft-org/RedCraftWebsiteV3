<x-section id="header" title="">
    <div class="flex flex-col sm:flex-row pb-12 gap-8">

        {{-- RedCraft animated logo --}}
        <div class="sm:w-1/2 h-fit flex justify-center my-auto">
            <img src="{{ asset('images/home/rc-logo-animated.gif') }}">
        </div>

        <div class="sm:w-1/2 flex flex-col justify-center">
            <h1>Bienvenue sur RedCraft !</h1>
            <p>Le retour de deux grandes communautés, TopRed et KingdomHills, à travers une toute nouvelle
                infrastructure Open Source.<br>Partage et Innovation seront notre crédo ! </p>
        </div>
    </div>
    <div class="flex flex-wrap justify-center gap-3">
        <x-home.CtaButton
            :type="'btn-primary'"
            :text1="'Rejoindre le serveur'"
            :text2="'69 joueurs en ligne'"
            :triggerText="'Adresse IP copiée !'">
                Call to action IP
        </x-home.CtaButton>
        <x-home.CtaButton
            :type="'btn-secondary'"
            :text1="'Rejoindre le Discord'"
            :text2="'420 joueurs en ligne'"
            :href="'https://discord.gg/xkWE4uJ'">
                Call to action IP
        </x-home.CtaButton>
    </div>
</x-section>
