<link rel="stylesheet" href="{{ mix('css/home.css') }}">
@push('scripts')
    <script src="{{ mix('js/pages/home.js') }}" type="text/javascript" defer></script>
@endpush


<x-app-layout>

    <x-home.header />

    <x-home.about />

    <x-home.news />

    <x-home.servers />

    <x-home.staff />

</x-app-layout>
