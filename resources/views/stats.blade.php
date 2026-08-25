@php
    // Plan is proxied from this origin by the Caddyfile the container runs, so
    // it is same-origin with the site rather than a different host.
    $statsPath = '/stats/network';

    // Plan reads its language from localStorage and offers no query parameter
    // or Accept-Language path. Sharing an origin is what lets the site write
    // that value, so this needs nothing changed inside Plan itself.
    $planLocale = strtoupper(app()->getLocale());
@endphp

<x-app-layout>

    <x-page-header section-title="{{ __('stats.title') }}" />

    <x-section section-title="{{ __('stats.section_title') }}" bg="bg-base-100" text="text-light"
        wave-bg="fill-base-100" wave-id="3" class="overflow-x-clip">

        <p class="mb-6 text-center">{{ __('stats.description') }}</p>

        {{-- Classic script, before the iframe, so the value is in place by the
             time Plan boots and reads it. Only a locale Plan ships is written,
             and a failure here just leaves Plan on its own default. --}}
        <script>
            (function () {
                var shipped = ['CN','CS','DE','EN','ES','FI','FR','IT','JA','KO','NL','PT_BR','RU'];
                var wanted = @json($planLocale);
                try {
                    if (shipped.indexOf(wanted) !== -1 && localStorage.getItem('locale') !== wanted) {
                        localStorage.setItem('locale', wanted);
                    }
                } catch (e) { /* storage unavailable, Plan keeps its default */ }
            })();
        </script>

        {{-- Plan is a full dashboard in its own right, so this hands it the room
             and lets it be itself. The section caps its content at screen-lg,
             which is far too narrow, so this steps outside that and recentres.

             A full 100vh because the navbar is relative rather than sticky, so
             nothing overlaps it. Scrolled into view it fills the screen, and a
             px cap would only shrink it on a tall monitor. --}}
        <div class="relative left-1/2 -translate-x-1/2 overflow-hidden rounded-lg shadow-lg bg-base-200"
             style="width: 80vw; height: 100vh; min-height: 36rem;">
            <iframe
                src="{{ $statsPath }}"
                title="{{ __('stats.title') }}"
                loading="lazy"
                class="absolute inset-0 w-full h-full border-0"
                allowfullscreen>
            </iframe>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ $statsPath }}" target="_blank" rel="noopener"
               class="btn btn-primary">{{ __('stats.fullscreen') }}</a>
        </div>

    </x-section>

</x-app-layout>
