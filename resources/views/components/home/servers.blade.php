@php
// TODO translate navigation menu names

$defaultKey = 'crea_build';

$servers = [
    'crea_build' => [
        'displayName' => __('home.servers.1.title'),
        'img' => asset('images/home/crea-build.webp'),
        'short-description' => __('home.servers.1.short_description'),
        'description' => __('home.servers.1.description'),
    ],
    'crea_red' => [
        'displayName' => __('home.servers.2.title'),
        'img' => asset('images/home/crea-redstone.webp'),
        'short-description' => __('home.servers.2.short_description'),
        'description' => __('home.servers.2.description'),
    ],
];
@endphp

<x-section id="servers" section-title="{{ __('home.servers.title') }}" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="2">
    <div id="dynamic-height" class="duration-300">
        <div id="inner-height" class="flex flex-col gap-16 sm:flex-row" x-data="{ open: '{{ $defaultKey }}' }">
            <div class="flex flex-col sm:w-1/2">
                @foreach ($servers as $key => $server)
                    <div class="my-8 duration-150 cursor-pointer hover:scale-102 active:scale-100"
                        x-on:click="open = '{{ $key }}'; expandSection();">
                        <h4 :class="open == '{{ $key }}' ? 'text-primary' : ''">{{ $server['displayName'] }}
                        </h4>
                        <p>{{ $server['short-description'] }}</p>
                    </div>
                    @if (!$loop->last)
                        <hr class="separator">
                    @endif
                @endforeach
            </div>
            <div id="servers-list" class="relative sm:w-1/2">
                @foreach ($servers as $key => $server)
                    <div class="w-full text-right server-description" x-show="open == '{{ $key }}'" x-cloak
                        x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                        x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-300 absolute top-0"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                        <h1 class="text-secondary">{{ $server['displayName'] }}</h1>
                        <p class="mt-8">{{ $server['description'] }}</p>
                        <img class="m-auto rounded-lg" alt="Image du serveur" src="{{ $server['img'] }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-section>

@push('scripts')
    <script>
        // The `inner-height` element sets the height from it's content
        // The `dynamic-height?` element animates it with a transition
        let innerElement = document.getElementById("inner-height");
        let dynamicElement = document.getElementById('dynamic-height')

        function expandSection() {
            // The timeout is needed in order to wait for the animation to start
            // and prevents long elements from overflowing to the next section
            setTimeout(() => {
                dynamicElement.style.height = innerElement.clientHeight + "px";
            }, 150);
        }

        expandSection();

        new ResizeObserver(expandSection).observe(innerElement);
    </script>
@endpush
