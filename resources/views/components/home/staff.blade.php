@php
$staffMembers = [
    [
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
    [
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
    [
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
    [
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
    [
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

<x-section id="staff" section-title="Staff" bg="bg-secondary" text="text-light" wave-bg="fill-secondary" wave-id="4">
    <div class="flex justify-evenly flex-wrap gap-y-8 gap-x-4">
        @foreach ($staffMembers as $staffMember)
            <div class="flex w-32 mx-4 flex-col gap-y-2">
                <img class="border-light border-4 rounded-md w-24 m-auto" alt="Membre du staff : {{ $staffMember['displayName'] }}"
                    src="https://mc-heads.net/avatar/{{ $staffMember['uuid'] }}">
                <p class="flex justify-evenly text-xl font-bold text-center">{{ $staffMember['displayName'] }}</p>
                <div class="flex justify-evenly flex-wrap">
                    @foreach ($staffMember['socials'] as $social)
                        <a class="transition ease-in-out delay-150 text-light hover:text-white duration-300" href={{ $social['url'] }} target="_blank">
                            <i class="fa-brands {{ $social['logo'] }} "></i>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-section>
