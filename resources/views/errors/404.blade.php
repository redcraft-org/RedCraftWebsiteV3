<x-app-layout>

    <x-page-header section-title="404 - Page introuvable" />

    <x-section section-title="La page que vous recherchez est introuvable" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-2/3">
                <p>Désolé ! Vous ne trouverez pas votre bonheur par ici.</p>
                <p>Vous souhaitez peut-être retourner sur une de ces pages :</p>
                <ul>
                    <li><a href="{{ route('home') }}">Page d'accueil</a></li>
                    <li><a href="{{ route('contact') }}">Page de contact</a></li>
                </ul>
            </div>
            <div class="md:w-1/3 grid items-center justify-items-center">
                <img src="{{ asset('images/page-not-found.png') }}" alt="RedCraft logo question mark">
            </div>
        </div>
    </x-section>

</x-app-layout>
