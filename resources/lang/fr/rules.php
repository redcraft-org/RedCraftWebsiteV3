<?php

return [
    'title' => 'Règles',

    'code_of_conduct' => [
        'title' => 'Code de conduite',
        '1' => [
            'title' => 'Se respecter',
            'description' => "Le respect est la base pour avoir une atmosphère saine et constructive. N'oublions pas que tout le monde n'a pas le même niveau de connaissances. Respectons ceux qui en ont moins que nous et encourageons leur curiosité. 🤝",
        ],
        '2' => [
            'title' => "S'entraider",
            'description' => "RedCraft.org a parmi ses objectifs la transmission de connaissances quelles qu'elles soient. Le partage est un pilier pour avoir une communauté soudée et active. 💪",
        ],
        '3' => [
            'title' => "S'amuser",
            'description' => 'Après tout, nous sommes tous en train de jouer à un jeu vidéo, alors essayons de passer du bon temps ensemble pour avoir une expérience en ligne inoubliable ! 😉',
        ],
    ],

    'rules' => [
        'title' => 'Règles',
        'description' => [
            '1' => 'La section suivante décrit les différents ',
            '2' => 'comportements interdits',
            '3' => " sur le serveur RedCraft.org. Ces règles s'appliquent à tous les joueurs, qu'ils soient membres du staff ou non.",
        ],
        'note' => 'Remarque : ',
        'general' => [
            'title' => 'Général',
            '1' => [
                'title' => 'Comportement général',
                '1' => "L'usurpation d'identité.",
                '2' => 'Avoir un pseudonyme, un nom ou une photo de profil outrageant.',
                '3' => "Tout comportement portant atteinte à l'intégrité d'une personne ou d'un groupe de personnes (insultes, provocation, discrimination, harcèlement, homophobie, transphobie), par message textuel, par discussion vocale, par réaction avec des emojis ou par tout autre moyen de communication.",
                '4' => 'Le spam des salons textuels, vocaux et des mentions au staff.',
                '5' => "L'utilisation du langage SMS dans les canaux publics.",
                '6' => "La divulgation d'informations privées.",
            ],
            '2' => [
                'title' => 'Le serveur Discord',
                '1' => "L'esquive de sanctions en quittant le Discord.",
                '2' => 'La publicité sur les canaux publics ainsi que la publicité massive via les canaux privés.',
            ],
        ],
        'minecraft' => [
            'title' => 'Minecraft',
            '1' => [
                'title' => 'Général',
                '1' => "Le grief, c'est-à-dire la destruction d'une construction d'un autre joueur sans son accord, la mise en place de pièges visant un autre joueur ou encore le vol d'items.",
                '2' => "L'utilisation de cheats, c'est-à-dire des logiciels ou des mods, ou l'exploitation de bugs présents dans le jeu et pouvant procurer un avantage conséquent par rapport aux autres joueurs.",
                '3' => "L'utilisation de plus d'un compte Minecraft par joueur.",
                '4' => "L'utilisation de logiciels ou de mods destinés à récupérer ou télécharger partiellement ou entièrement la map du serveur.",
                '5' => [
                    'title' => "La possession continue d'un item modifié",
                    '1' => 'Donnant au joueur un avantage par rapport aux autres (effet, potion).',
                    '2' => 'Dont le nom ou la description enfreint la règle 1.3 de la section Général.',
                    '3' => [
                        'title' => "Donnant accès à des commandes auxquelles le joueur n'a normalement pas accès.",
                        'note' => "si un joueur reçoit ou trouve un item modifié tel que décrit par la règle 1.5 ci-dessus, il doit immédiatement avertir le staff, donner l'item à un membre du staff et s'en débarrasser par la suite.",
                    ],
                ],
            ],
            '2' => [
                'title' => 'Créatif Redstone',
                '1' => [
                    'title' => "La création de clocks, c'est-à-dire des systèmes provoquant une activation répétée du système sans interaction nécessaire de la part du joueur.",
                    'note' => "les clocks s'arrêtant automatiquement au bout d'un court instant sont tolérées tant qu'elles sont réactivables uniquement via l'interaction d'un joueur.",
                ],
                '2' => 'Le spam des systèmes redstone des autres joueurs.',
                '3' => "L'appropriation d'une création qui n'a pas été créée par soi-même.",
            ],
            '3' => [
                'title' => 'Créatif Build',
                '1' => "Les règles de la section Général de Minecraft s'appliquent ici.",
            ],
            '4' => [
                'title' => 'Survie',
                '1' => 'Collaboration : Pour contribuer à un projet public, il faut d\'abord se référer au joueur responsable de la construction. Si vous souhaitez entreprendre un grand projet, assurez-vous de ne pas déranger d\'autres joueurs qui construisent à proximité. Dans le doute, demandez.',
                '2' => 'Toutes les fermes doivent pouvoir être désactivées afin d\'éviter le lag.',
                '3' => [
                    'title' => 'L\'abus de mécaniques non-officielles',
                    'description' => 'telle que les bugs et les glitches qui procurent un avantage déloyal par rapport aux autres joueurs est interdite.',

                    'table' => [
                        'headers' => ['Autorisé', 'Interdit'],
                        'columns' => [['Duplication de TNT. Exemple : machine à tunnel, quarry', 'FreeCam, pour regarder autour de vous en surface', 'Autoclicker', ''], ['Duplication de coffre, de shulker et de tout autres conteneurs', 'Minage avec Xray, ou utilisation de la FreeCam pour voir sous terre', 'Avoir un Mod donnant un avantage sur le PVP, par exemple Kill Aura ou Kill Reach', 'Minage automatique. Par exemple : Baritone']],
                    ],

                    'note' => 'Les clients modifiés (mods) sont des mécaniques non officielles.',
                ],
                '4' => [
                    'title' => 'Ne détruisez pas les constructions ou les biens des autres joueurs sans leur permission.',
                    'description' => 'Respectez le travail et les efforts des autres. Ne détruisez pas ou ne modifiez pas leurs bâtiments, leurs cultures, leurs élevages ou toute autre structure. Pour toute structure abandonnée par un joueur inactif, l\'autorisation devra être demandée pour utiliser l\'espace.',
                    'note' => 'Avant de modifier le terrain ou d\'emprunter les affaires d\'une personne, assurez-vous d\'avoir son accord. Dans le doute, demandez !',
                ],
                '5' => 'Voler les affaires ou les ressources d\'un autre joueur est interdit.',
                '6' => "Le PVP non consenti est interdit. Ou tout autre form d'harcèlement.",
            ],
        ],
    ],
];
