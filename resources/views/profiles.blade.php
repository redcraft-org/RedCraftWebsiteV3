<x-app-layout>

    <x-page-header section-title="{{ __('profiles.title') }}">
        <x-slot name="description">
            @livewire('components.player-search')
        </x-slot>
    </x-page-header>
    @livewire('components.player-profile')
    {{-- <x-profiles.contact-form /> --}}


</x-app-layout>
