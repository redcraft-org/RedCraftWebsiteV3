@php
    $mapUrl = config('services.bluemap-url');
@endphp

<x-app-layout title="{{ __('maps.title') }}">

    <x-page-header section-title="{{ __('maps.title') }}" />

    {{-- overflow-x-clip so the full bleed map below cannot introduce a
         horizontal scrollbar. clip rather than hidden, since hidden would make
         this a scroll container and break the sticky navbar above it. --}}
    <x-section section-title="{{ __('maps.section_title') }}" bg="bg-base-100" text="text-light"
        wave-bg="fill-base-100" wave-id="3" class="overflow-x-clip">

        <p class="mb-6 text-center">{{ __('maps.description') }}</p>

        {{-- BlueMap ships its own world picker and controls, so this only has to
             give it room and stay out of the way.

             The section constrains its content to screen-lg, which is not much
             of a map. This steps outside that and takes 80% of the viewport,
             recentring itself, so the map is wide while the text above it still
             reads at a sensible measure. --}}
        <div class="relative left-1/2 -translate-x-1/2 overflow-hidden rounded-lg shadow-lg bg-base-200"
             style="width: 80vw; height: min(80vh, 1100px); min-height: 24rem;">
            <iframe
                src="{{ $mapUrl }}"
                title="{{ __('maps.title') }}"
                loading="lazy"
                class="absolute inset-0 w-full h-full border-0"
                allowfullscreen>
            </iframe>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ $mapUrl }}" target="_blank" rel="noopener"
               class="btn btn-primary">{{ __('maps.fullscreen') }}</a>
        </div>

    </x-section>

</x-app-layout>
