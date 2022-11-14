<link rel="stylesheet" href="{{ mix('css/rules.css') }}">

@php
    $rules = [
        __('rules.rules.general.title') => [
            __('rules.rules.general.1.title') => [
                __('rules.rules.general.1.1'),
                __('rules.rules.general.1.2'),
                __('rules.rules.general.1.3'),
                __('rules.rules.general.1.4'),
                __('rules.rules.general.1.5'),
                __('rules.rules.general.1.6'),
            ],
            __('rules.rules.general.2.title') => [
                __('rules.rules.general.2.1'),
                __('rules.rules.general.2.2'),
            ],
        ],
        __('rules.rules.minecraft.title') => [
            __('rules.rules.minecraft.1.title') => [
                __('rules.rules.minecraft.1.1'),
                __('rules.rules.minecraft.1.2'),
                __('rules.rules.minecraft.1.3'),
                __('rules.rules.minecraft.1.4'),
                __('rules.rules.minecraft.1.5.title') => [
                    __('rules.rules.minecraft.1.5.1'),
                    __('rules.rules.minecraft.1.5.2'),
                    __('rules.rules.minecraft.1.5.3.title'),
                    "note" => __('rules.rules.minecraft.1.5.3.note'),
                ]
            ],
            __('rules.rules.minecraft.2.title') => [
                __('rules.rules.minecraft.2.1.title'),
                "note" => __('rules.rules.minecraft.2.1.note'),
                __('rules.rules.minecraft.2.2'),
                __('rules.rules.minecraft.2.3'),
            ],
            __('rules.rules.minecraft.3.title') => [
                __('rules.rules.minecraft.3.1'),
            ],
        ],
    ];
@endphp

<x-app-layout>

    <x-page-header section-title="{{ __('rules.title') }}" />

    <x-section section-title="Code de conduite" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3"
        x-data="{ open: 'respecter' }">
        <div class="flex flex-col md:flex-row justify-around my-4">
            <div class="code-conduct-item" tabindex="0" @mouseover="open = 'respecter'"
                :class="open == 'respecter' && 'focused'">
                <i class="fas fa-hands-helping code-conduct-icon"></i>
                <h4 class="code-conduct-title">@lang('rules.code_of_conduct.1.title')</h4>
            </div>
            <div class="code-conduct-item" tabindex="1" @mouseover="open = 'sentraider'"
                :class="open == 'sentraider' && 'focused'">
                <i class="fas fa-people-carry code-conduct-icon"></i>
                <h4 class="code-conduct-title">@lang('rules.code_of_conduct.2.title')</h4>
            </div>
            <div class="code-conduct-item" tabindex="2" @mouseover="open = 'samuser'"
                :class="open == 'samuser' && 'focused'">
                <i class="fas fa-gamepad code-conduct-icon"></i>
                <h4 class="code-conduct-title">@lang('rules.code_of_conduct.3.title')</h4>
            </div>
        </div>
        <div x-cloak class="relative">
            {{-- Note: remove the `absolute w-full top-0` classes on the element with the longest text --}}
            {{--       in order to have the height of the container relative to the longest child --}}
            <div class="code-conduct-details" :class="open != 'respecter' && 'opacity-0'">
                <div class="text text-xl">@lang('rules.code_of_conduct.1.description')</div>
            </div>
            <div class="code-conduct-details absolute w-full top-0" :class="open != 'sentraider' && 'opacity-0'">
                <div class="text text-xl">@lang('rules.code_of_conduct.2.description')</div>
            </div>
            <div class="code-conduct-details absolute w-full top-0" :class="open != 'samuser' && 'opacity-0'">
                <div class="text text-xl">@lang('rules.code_of_conduct.3.description')</div>
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

        <em>
            @lang('rules.rules.description.1')
            <b>@lang('rules.rules.description.2')</b>
            @lang('rules.rules.description.3')
        </em>
        <div class="my-3">
            @include('components/rules/recursive-rule', ['rules' => $rules, 'level' => 1])
        </div>
    </x-section>

</x-app-layout>
