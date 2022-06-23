@php
$staffMembers = [
    'lululombard' => [
        'displayName' => 'Lululombard',
        'uuid' => '15f7b6b0-d787-48e2-b54b-0336e17f6316',
        'socials' => [
            [
                'socialName' => 'steam',
                'logo' => 'fa-steam',
                'url' => 'https://google.com',
            ],
            [
                'socialName' => 'discord',
                'logo' => 'fa-discord',
                'url' => 'https://google.com',
            ],
            [
                'socialName' => 'twitter',
                'logo' => 'fa-twitter',
                'url' => 'https://google.com',
            ],
            [
                'socialName' => 'youtube',
                'logo' => 'fa-youtube',
                'url' => 'https://google.com',
            ],
        ],
    ],
    'Nano' => [
        'displayName' => 'Nano',
        'uuid' => '45418653-fadb-4e6d-8dcc-8c79b90ec527',
        'socials' => [
            [
                'socialName' => 'steam',
                'logo' => 'fa-steam',
                'url' => 'https://google.com',
            ],
        ],
    ],
    'Codelta' => [
        'displayName' => 'Codelta',
        'uuid' => '9430befb-3238-455c-be89-1ff0cd5907f2',
        'socials' => [
            [
                'socialName' => 'steam',
                'logo' => 'fa-steam',
                'url' => 'https://google.com',
            ],
        ],
    ],
    'Omeganx' => [
        'displayName' => 'Omeganx',
        'uuid' => '742f8aa4-7ec7-4caf-aad9-244813484450',
        'socials' => [
            [
                'socialName' => 'steam',
                'logo' => 'fa-steam',
                'url' => 'https://google.com',
            ],
        ],
    ],
    'Likyaz' => [
        'displayName' => 'Likyaz',
        'uuid' => '3d4213de-68fc-4494-b043-82a27e7ab56a',
        'socials' => [
            [
                'socialName' => 'steam',
                'logo' => 'fa-steam',
                'url' => 'https://google.com',
            ],
        ],
    ],
];
@endphp

<x-section id="staff" title="Staff">
    <div class="staff-members flex-wrap">
        @foreach ($staffMembers as $staffMember)
            <div class="staff-member">
                <img class="staff-member-image" alt="Membre du staff : {{ $staffMember['displayName'] }}"
                    src="https://mc-heads.net/avatar/{{ $staffMember['uuid'] }}">
                <h3 class = "staff-member-name">
                    {{ $staffMember['displayName'] }}
                </h3>
                <div class="staff-member-socials">
                    @foreach ($staffMember['socials'] as $social)
                        <a class="staff-member-social" href={{ $social['url'] }}>
                            <i class="fa-brands {{ $social['logo'] }} ">
                            </i>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-section>
