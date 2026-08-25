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
                '1_note' => "Être membre du plot d'un autre joueur ne signifie pas que vous pouvez modifier son terrain sans son accord.",
                '2' => "L'utilisation de cheats, c'est-à-dire des logiciels ou des mods, ou l'exploitation de bugs présents dans le jeu et pouvant procurer un avantage déloyal par rapport aux autres joueurs.",
                '3' => "L'utilisation de logiciels ou de mods destinés à récupérer ou télécharger partiellement ou entièrement la map du serveur.",
                '4' => [
                    'title' => "La possession continue d'un item modifié",
                    '1' => 'Donnant au joueur un avantage par rapport aux autres (effet, potion).',
                    '2' => 'Dont le nom ou la description enfreint la règle 1.3 de la section Général.',
                    '3' => [
                        'title' => "Donnant accès à des commandes auxquelles le joueur n'a normalement pas accès.",
                        'note' => "si un joueur reçoit ou trouve un item modifié tel que décrit ci-dessus, il doit immédiatement avertir le staff, donner l'item à un membre du staff et s'en débarrasser par la suite.'item à un membre du staff et s'en débarrasser par la suite.",
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
                'intro' => "Le serveur Survie Vanilla a pour but d'être laxiste sur les règles afin de favoriser une expérience de jeu libre. Les sanctions sont cependant appliquées sans préavis, alors utilisez votre bon sens, et si une règle est floue n'hésitez pas à contacter un membre du staff.",
                'intro_sanctions' => "Les sanctions sur le serveur survie sont strictes. En général la première est un ban d'un mois et la deuxième un ban définitif. En cas de violation intentionnelle, le ban définitif est privilégié comme première sanction. L'application se fait au cas par cas et le staff a le choix final.",
                '1' => 'La contribution à un projet public sans s\'être d\'abord référé au joueur responsable de la construction, ou le lancement d\'un grand projet qui dérange les joueurs construisant à proximité.',
                '1_note' => 'Dans le doute, demandez.',
                '2' => 'Les fermes qui ne peuvent pas être désactivées et qui provoquent du lag.',
                '3' => [
                    'title' => 'L\'abus de mécaniques non-officielles',
                    'description' => 'telles que les bugs et les glitches qui procurent un avantage déloyal par rapport aux autres joueurs.',

                    'table' => [
                        'headers' => ['Autorisé', 'Interdit'],
                        'columns' => [['Duplication de TNT. Exemple : machine à tunnel, quarry', 'FreeCam, pour regarder autour de vous en surface', 'Autoclicker', ''], ['Duplication de coffres, de shulkers et de tous les autres conteneurs', 'Minage avec Xray, ou utilisation de la FreeCam pour voir sous terre', 'Avoir un Mod donnant un avantage sur le PVP, par exemple Kill Aura ou Kill Reach', 'Minage automatique. Par exemple : Baritone']],
                    ],

                    'note_scope' => "Le tableau suivant donne des exemples de situations autorisées et non autorisées. Cette liste n'est pas exhaustive, utilisez-la pour vous faire une idée de ce qui est autorisé ou non sur le serveur, et contactez un membre du staff si vous n'êtes pas sûr.",
                    'note' => 'Les clients modifiés (mods) sont des mécaniques non officielles.',
                ],
                '4' => [
                    'title' => 'La destruction ou la modification des constructions ou des biens d\'un autre joueur sans sa permission.',
                    'description' => 'Respectez le travail et les efforts des autres. Ne détruisez pas ou ne modifiez pas leurs bâtiments, leurs cultures, leurs élevages ou toute autre structure. Pour toute structure abandonnée par un joueur inactif, l\'autorisation devra être demandée pour utiliser l\'espace.',
                    'note' => 'Avant de modifier le terrain ou d\'emprunter les affaires d\'une personne, assurez-vous d\'avoir son accord. Dans le doute, demandez !',
                ],
                '5' => 'Le vol des affaires ou des ressources d\'un autre joueur.',
                '6' => "Le PVP non consenti.",
                '7' => "L'utilisation de plus d'un compte Minecraft par joueur sur ce serveur.",
            ],
        ],
    ],
];
