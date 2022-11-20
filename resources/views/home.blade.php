<link rel="stylesheet" href="{{ mix('css/home.css') }}">

<x-app-layout>

    <x-home.header />

    <x-home.about />

    {{-- TODO uncomment to show the news section on the homepage --}}
    {{-- <x-home.news /> --}}

    <x-home.servers />

    <x-home.staff />

</x-app-layout>
