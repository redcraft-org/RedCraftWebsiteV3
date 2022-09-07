<link rel="stylesheet" href="{{ mix('css/rules.css') }}">

<x-app-layout>

    <x-page-header section-title="Règles" />

    <x-section section-title="Code de conduite" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3" x-data="{ open: '' }">
        <p class="text-center text-white-50"><small><i>Cliquez sur les icônes pour en savoir plus.</i></small></p>
        <div class="flex flex-col md:flex-row justify-around my-4">
            <div class="code-conduct-item" tabindex="0" x-on:click="open = 'respecter'" :class="open == 'respecter' && 'focused'">
                <i class="fas fa-hands-helping code-conduct-icon"></i>
                <h4 class="code-conduct-title">Se respecter</h4>
            </div>
            <div class="code-conduct-item" tabindex="1" x-on:click="open = 'sentraider'" :class="open == 'sentraider' && 'focused'">
                <i class="fas fa-people-carry code-conduct-icon"></i>
                <h4 class="code-conduct-title">S'entraider</h4>
            </div>
            <div class="code-conduct-item" tabindex="2" x-on:click="open = 'samuser'" :class="open == 'samuser' && 'focused'">
                <i class="fas fa-gamepad code-conduct-icon"></i>
                <h4 class="code-conduct-title">S'amuser</h4>
            </div>
        </div>
        <div x-cloak class="details position-relative d-flex">
            <div class="code-conduct" x-show="open == 'respecter'" x-transition>
                <div class="text lead">
                    Le respect est la base pour avoir une atmosphère saine et constructive.
                    N'oublions pas que tout le monde n'a pas le même niveau de connaissances,
                    respectons ceux qui en ont moins que nous et encouragons leur curiosité. 🤝
                </div>
            </div>
            <div class="code-conduct" x-show="open == 'sentraider'" x-transition>
                <div class="text lead">
                    RedCraft.org a parmi ses objectifs la transmission de connaissances
                    quelle qu'elles soient. Le partage est un pilier pour avoir
                    une communauté soudée et active. 💪
                </div>
            </div>
            <div class="code-conduct" x-show="open == 'samuser'" x-transition>
                <div class="text lead">
                    Après-tout, nous sommes tous en train de jouer à un jeu vidéo ! Alors
                    essayons de passer du bon temps ensemble pour avoir une
                    expérience en ligne inoubliable ! 😉
                </div>
            </div>
        </div>
    </x-section>

</x-app-layout>
