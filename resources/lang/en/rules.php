<?php

return [
    'title' => 'Rules',

    'code_of_conduct' => [
        'title' => 'Code of conduct',
        '1' => [
            'title' => 'Respect each other',
            'description' => "Respect is the basis for a healthy and constructive atmosphere. Let's not forget that not everyone has the same level of knowledge, let's respect those who have less than you and encourage their curiosity. 🤝",
        ],
        '2' => [
            'title' => 'Help each other',
            'description' => 'RedCraft.org has among its objectives the transmission of knowledge whatever it is. Sharing is a pillar to have a united and active community. 💪',
        ],
        '3' => [
            'title' => 'Have fun',
            'description' => "After all, we are all playing a video game! So let's try to have a good time together to have an unforgettable online experience 😉",
        ],
    ],

    'rules' => [
        'title' => 'Rules',
        'description' => [
            '1' => 'The following section describes the various ',
            '2' => 'prohibited behaviors',
            '3' => ' on the RedCraft.org server. These rules are to be followed by all players, whether they are staff members or not.',
        ],
        'note' => 'Note: ',
        'general' => [
            'title' => 'General',
            '1' => [
                'title' => 'General behaviour',
                '1' => 'Identity theft.',
                '2' => 'Have an outrageous nickname, name or profile picture.',
                '3' => 'Any behavior that violates the integrity of a person or group of people (insult, provocation, discrimination, harassment, homophobia, transphobia), whether by text message, voice chat, reaction with emojis or with any other form of communication.',
                '4' => 'Spamming of text and voice channels and mentions to staff.',
                '5' => 'The use of SMS language in public channels.',
                '6' => 'Disclosure of private information.',
            ],
            '2' => [
                'title' => 'The Discord server',
                '1' => 'Punishment dodge by leaving the Discord.',
                '2' => 'Advertising on public channels as well as massive advertising via private channels.',
            ],
        ],
        'minecraft' => [
            'title' => 'Minecraft',
            '1' => [
                'title' => 'General',
                '1' => "Griefing, i.e. destroying another player's building without his consent, setting traps that attack another player or stealing items.",
                '1_note' => "Being a member of another player's plot does not mean you may modify their land without their consent.",
                '2' => 'The use of cheats, i.e. software, mods or the exploitation of bugs present in the game that can provide an unfair advantage over other players.',
                '3' => 'The use of software or mods intended to recover/download partially or entirely the map of the server.',
                '4' => [
                    'title' => 'Continued possession of a modified item',
                    '1' => 'Giving the player an advantage over the others (effect, potion, etc...).',
                    '2' => 'Having a name or description that violates General rule 1.3.',
                    '3' => [
                        'title' => 'Giving access to commands normally out of reach of the player.',
                        'note' => 'If a player receives or finds an altered item as described above, he/she must immediately notify the staff, give the item to a staff member and then dispose of it.',
                    ],
                ],
            ],
            '2' => [
                'title' => 'Creative Redstone',
                '1' => [
                    'title' => 'The creation of Clocks, i.e. systems that cause a repeated activation of the system without any necessary interaction by a player.',
                    'note' => 'Clocks that automatically stop after a short time are tolerated as long as they can only be reactivated by player interaction.',
                ],
                '2' => "Spamming other players' Redstone systems.",
                '3' => 'The appropriation of a creation that was not created by oneself.',
            ],
            '3' => [
                'title' => 'Creative Build',
                '1' => 'The rules of the Minecraft General section apply here.',
            ],
            '4' => [
                'title' => 'Survival',
                'intro' => "The Vanilla Survival server aims to be lax on rules, to encourage a free play experience. Sanctions are applied without warning, however, so use your common sense, and if a rule is unclear do not hesitate to contact a staff member.",
                'intro_sanctions' => "Sanctions on the survival server are strict. As a rule the first is a one month ban and the second is permanent. For a deliberate breach the permanent ban is preferred as the first sanction. Sanctions are applied case by case and the staff has the final say.",
                '1' => 'Contributing to a public project without first referring to the player responsible for it, or starting a large project that disturbs other players building nearby.',
                '1_note' => 'When in doubt, ask.',
                '2' => 'Farms that cannot be deactivated, and so cause lag.',
                '3' => [
                    'title' => 'Abuse of unofficial mechanics',
                    'description' => 'such as bugs and glitches that provide an unfair advantage over other players.',
                    'table' => [
                        'headers' => ['Allowed', 'Not Allowed'],
                        'columns' => [['Duplication of TNT. Example: tunnel machine, quarry', 'FreeCam, to look around above ground', 'Autoclicker', ''], ['Duplication of chests, shulkers and all other containers', 'Mining with Xray, or using FreeCam to see underground', 'Having a Mod giving an advantage on PVP, for example Kill Aura or Kill Reach', 'Automatic mining. Example: Baritone']],
                    ],

                    'note_scope' => "The table below gives examples of what is and is not allowed. It is not exhaustive, use it to get a sense of what goes on the server, and contact a staff member if you are unsure.",
                    'note' => 'Modified clients (mods) are unofficial mechanics.',
                ],
                '4' => [
                    'title' => 'The destruction or modification of another player\'s constructions or goods without their permission.',
                    'description' => 'Respect the work and efforts of others. Do not destroy or modify their buildings, crops, livestock, or any other structure. For any structure abandoned by an inactive player, permission must be requested to use the space.',
                    'note' => 'Before modifying the terrain or borrowing someone\'s belongings, make sure you have their agreement. When in doubt, ask!',
                ],
                '5' => 'The theft of another player\'s belongings or resources.',
                '6' => 'Unwanted PVP.',
                '7' => "The use of more than one Minecraft account per player on this server.",
            ],
        ],
    ],
];
