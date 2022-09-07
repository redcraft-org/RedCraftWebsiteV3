{{-- <link rel="stylesheet" href="{{ mix('css/rules.css') }}"> --}}

@php
$rules = [
    'Général' => [
        'Comportement général' => ["L'usurpation d'identité.", 'Avoir un pseudonyme, nom ou photo de profil outrageant.', "Tout comportement portant atteinte à l'intégrité d'une personne ou d'un groupe de personnes (insulte, provocation, discrimination, harcèlement, homophobie, transphobie), que ça soit par message textuel, par discussion vocale, par réaction avec des emojis ou avec tout autre moyen de communication.", 'Le spam des salons textuels, vocaux et des mentions au staff.', "L'utilisation de langage SMS dans les canaux publics.", "La divulgation d'informations privées."],
        'Le Discord' => ["L'esquive de sanction en quittant le discord.", 'La publicité sur les canaux publics ainsi que la publicité massive via les canaux privés.'],
    ],
    'Minecraft' => [
        'Général' => ['Le grief.', "L'utilisation de cheats, c'est-à-dire des logiciels, des mods ou l'exploitation de bugs présents dans le jeu pouvant procurer un avantage conséquent, au détriment des autres joueurs.", "L'utilisation de plus d'un compte Minecraft par joueur.", "L'utilisation de logiciels ou de mods destinés à récupérer/télécharger partiellement ou entièrement la map du serveur.", "Possession continue d'un item modifié" => ['Donnant au joueur un avantage par rapport aux autres (effet, potion).', 'Ayant un nom ou une description enfreignant la règle 1.3.', "Donnant l'accès à des commandes normalement hors d'accès au joueur.", "note" => "Si un joueur reçoit ou trouve un item modifié correspondant à la règle 2.1.4, il doit immédiatement avertir le staff, donner l'item à un membre du staff et s'en débarrasser par la suite."]],
        'Créatif Redstone' => ["La création de Clocks, c'est-à-dire des systèmes provoquant une activation répétée du système sans interaction nécessaire par un joueur.", "note" => "Les \"Clocks\" s'arrêtant automatiquement au bout d'un court instant sont tolérées tant qu'elles sont réactivables uniquement via l'interaction d'un joueur.", 'Le spam des systèmes Redstone des autres joueurs.', "L'appropriation d'une création qui n'a pas été crée par soi-même."],
        'Créatif Build' => [],
    ],
];
@endphp

<x-app-layout>

    <x-page-header section-title="Règles" />

    <x-section section-title="Code de conduite" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3"
        x-data="{ open: '' }">
        <p class="text-center text-white-50"><small><i>Cliquez sur les icônes pour en savoir plus.</i></small></p>
        <div class="flex flex-col md:flex-row justify-around my-4">
            <div class="code-conduct-item" tabindex="0" x-on:click="open = 'respecter'"
                :class="open == 'respecter' && 'focused'">
                <i class="fas fa-hands-helping code-conduct-icon"></i>
                <h4 class="code-conduct-title">Se respecter</h4>
            </div>
            <div class="code-conduct-item" tabindex="1" x-on:click="open = 'sentraider'"
                :class="open == 'sentraider' && 'focused'">
                <i class="fas fa-people-carry code-conduct-icon"></i>
                <h4 class="code-conduct-title">S'entraider</h4>
            </div>
            <div class="code-conduct-item" tabindex="2" x-on:click="open = 'samuser'"
                :class="open == 'samuser' && 'focused'">
                <i class="fas fa-gamepad code-conduct-icon"></i>
                <h4 class="code-conduct-title">S'amuser</h4>
            </div>
        </div>
        <div x-cloak class="relative">
            <div class="code-conduct-details" :class="open != 'respecter' && 'opacity-0'">
                <div class="text lead">
                    Le respect est la base pour avoir une atmosphère saine et constructive.
                    N'oublions pas que tout le monde n'a pas le même niveau de connaissances,
                    respectons ceux qui en ont moins que nous et encouragons leur curiosité. 🤝
                </div>
            </div>
            <div class="code-conduct-details absolute w-full top-0" :class="open != 'sentraider' && 'opacity-0'">
                <div class="text lead">
                    RedCraft.org a parmi ses objectifs la transmission de connaissances
                    quelle qu'elles soient. Le partage est un pilier pour avoir
                    une communauté soudée et active. 💪
                </div>
            </div>
            <div class="code-conduct-details absolute w-full top-0" :class="open != 'samuser' && 'opacity-0'">
                <div class="text lead">
                    Après-tout, nous sommes tous en train de jouer à un jeu vidéo ! Alors
                    essayons de passer du bon temps ensemble pour avoir une
                    expérience en ligne inoubliable ! 😉
                </div>
            </div>
        </div>
    </x-section>

    <x-section section-title="Règles" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="2"
        x-data="{ open: '' }">

        {{-- Wall of Shame card --}}
        {{-- Remove these comments when adding the "Wall of Shame" page --}}
        {{-- <div class="card-wall-of-shame card border-dark float-md-right mx-md-3 my-3 col-12 col-md-6 col-lg-4"> --}}
        {{-- <div class="card-body"> --}}
        {{-- <h5 class="card-title">Le Mur de la Honte</h5> --}}
        {{-- <p class="card-text">Sur cette page se trouve la liste de toutes les personnes actuellement sanctionnées sur RedCraft.org, la --}}
        {{-- raison de la sanction et la peine endurée.</p> --}}
        {{-- <a href="#">Le Mur de la Honte</a> --}}
        {{-- </div> --}}
        {{-- </div> --}}

        <em>La section suivante décrit les différents <b>comportements interdits</b> au sein de RedCraft.org.</em>
        <div class="my-3">
            @include('components/rules/recursive-rule', ['rules' => $rules, 'level' => 1])
        </div>
    </x-section>

</x-app-layout>
