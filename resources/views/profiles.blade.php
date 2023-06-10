<x-app-layout>

    <x-page-header section-title="{{ __('profiles.title') }}">
        <x-slot name="description">
            @livewire('components.player-search')
        </x-slot>
    </x-page-header>

    {{-- <x-profiles.contact-form /> --}}


</x-app-layout>
