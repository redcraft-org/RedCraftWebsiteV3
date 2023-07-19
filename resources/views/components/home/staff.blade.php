@php
    $staff = [
        [
            'rankName' => __('home.staff.admins'),
            'members' => [
                [
                    'displayName' => 'Nano',
                    'uuid' => '45418653-fadb-4e6d-8dcc-8c79b90ec527',
                    'socials' => [
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/Nano1010010110',
                        ],
                    ],
                ],
                [
                    'displayName' => 'Codelta',
                    'uuid' => '9430befb-3238-455c-be89-1ff0cd5907f2',
                    'socials' => [
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/Code1ta',
                        ],
                        [
                            'socialName' => 'youtube',
                            'logo' => 'fa-youtube',
                            'url' => 'https://www.youtube.com/@cod3lta',
                        ],
                        [
                            'socialName' => 'GitHub',
                            'logo' => 'fa-github',
                            'url' => 'https://github.com/Cod3lta/',
                        ],
                    ],
                ],
                [
                    'displayName' => 'lululombard',
                    'uuid' => '15f7b6b0-d787-48e2-b54b-0336e17f6316',
                    'socials' => [
                        [
                            'socialName' => 'twitch',
                            'logo' => 'fa-twitch',
                            'url' => 'https://www.twitch.tv/lululombard',
                        ],
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/lululombard',
                        ],
                        [
                            'socialName' => 'youtube',
                            'logo' => 'fa-youtube',
                            'url' => 'https://www.youtube.com/@lululombard',
                        ],
                    ],
                ],
                [
                    'displayName' => 'Omeganx',
                    'uuid' => '742f8aa4-7ec7-4caf-aad9-244813484450',
                    'socials' => [
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/Omeganx',
                        ],
                    ],
                ],
                [
                    'displayName' => 'Likyaz',
                    'uuid' => '3d4213de-68fc-4494-b043-82a27e7ab56a',
                    'socials' => [
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/LikyazRS',
                        ],
                    ],
                ],
                [
                    'displayName' => 'cmoa',
                    'uuid' => '75253c0b-5c34-4019-aa30-82edda5dcb75',
                    'socials' => [
                        [
                            'socialName' => 'youtube',
                            'logo' => 'fa-youtube',
                            'url' => 'https://www.youtube.com/@cmoa2161',
                        ],
                    ],
                ],
            ],
        ],
        [
            'rankName' => __('home.staff.mods'),
            'members' => [
                [
                    'displayName' => 'Fulbringer',
                    'uuid' => '892250f2-ba97-4212-b3a1-3b1655f678e6',
                    'socials' => [
                        [
                            'socialName' => 'twitter',
                            'logo' => 'fa-twitter',
                            'url' => 'https://twitter.com/FulbringerS',
                        ],
                    ],
                ],
                [
                    'displayName' => 'PhilQc',
                    'uuid' => '351e0bf7-cffc-4428-8bcd-d26db046d60b',
                    'socials' => [],
                ],
            ],
        ],
    ];
@endphp

<x-section id="staff" section-title="{{ __('home.staff.title') }}" bg="bg-secondary" text="text-light"
    wave-bg="fill-secondary" wave-id="4">
    @foreach ($staff as $rank)
        <div class="my-6">
            {{-- Rank name --}}
            <div class="relative flex py-5 items-center">
                <div class="flex-grow border-t-2 border-gray"></div>
                <span class="flex-shrink mx-4 text-light">{{ $rank['rankName'] }}</span>
                <div class="flex-grow border-t-2 border-gray"></div>
            </div>
            {{-- Rank members --}}
            <div class="flex justify-evenly flex-wrap gap-y-8 gap-x-4 mt-4">
                @foreach ($rank['members'] as $staffMember)
                    <div class="flex flex-col w-32 mx-4 gap-y-2">
                        <img class="w-16 m-auto border-4 rounded-md border-base-100 shadow-lg"
                            alt="Membre du staff : {{ $staffMember['displayName'] }}"
                            src="https://mc-heads.net/avatar/{{ $staffMember['uuid'] }}">
                        <p class="flex text-xl font-bold text-center justify-evenly text-white">
                            {{ $staffMember['displayName'] }}
                        </p>
                        <div class="flex flex-wrap justify-evenly">
                            @foreach ($staffMember['socials'] as $social)
                                <a class="transition ease-in-out delay-150 !text-light-gray"
                                    href={{ $social['url'] }} target="_blank">
                                    <i class="fa-brands {{ $social['logo'] }} "></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <p class="text-center">
        @lang('home.staff.description.1')
        <a href="{{ route('contact') }}">@lang('home.staff.description.2')</a>
        @lang('home.staff.description.3')
    </p>

</x-section>
