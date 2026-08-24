@push('styles')
    @vite('resources/sass/pages/home.scss')
@endpush

<x-app-layout>

    <x-home.header />

    <x-home.about />

    {{-- TODO uncomment to show the news section on the homepage --}}
    {{-- <x-home.news /> --}}

    <x-home.servers />

    <x-home.staff />

</x-app-layout>
