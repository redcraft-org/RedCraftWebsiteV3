<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Page name first: a tab strip full of RedCraft tabs is unreadable
             when the site name leads every one of them. --}}
        <title>{{ $title ? $title . ' | ' . config('app.name', 'RedCraft') : config('app.name', 'RedCraft') }}</title>


        <link rel="icon" href="/favicon.ico" sizes="48x48">
        <link rel="icon" href="/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- Scripts -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        {{-- Alpine comes from Livewire now, so every layout has to load it or
             the pages using this one lose their interactivity entirely. --}}
        @livewireScripts
    </body>
</html>
