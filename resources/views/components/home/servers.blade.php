@php
// TODO translate navigation menu names

$defaultKey = 'crea_build';

$servers = [
    'crea_build' => [
        'displayName' => 'Creatif Build',
        'img' => asset('images/home/server-render.png'),
        'short-description' => '
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Duis feugiat, ex ac cursus imperdiet, tortor dolor blandit diam,
            et imperdiet dui ex vitae odio.
        ',
        'description' => '
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacus purus,
        semper et dui eu, facilisis dignissim quam. Aliquam erat volutpat. Mauris
        sit amet imperdiet felis, id ultrices quam. Integer nec fermentum odio, eu
        dictum enim. Etiam blandit tortor velit, in placerat nulla luctus sit amet.
        Nulla euismod finibus justo, id elementum diam tempor vitae. Morbi
        condimentum, turpis eu rhoncus sollicitudin, enim quam luctus neque,
        sodales hendrerit metus magna ut eros. Fusce ipsum mi, sollicitudin id
        ipsum et, porta efficitur ex. Curabitur pulvinar, nisl vel viverra
        faucibus, nisi elit auctor quam, id imperdiet ligula lacus ac diam. Ut in
        lorem quis purus ornare finibus. Phasellus tincidunt luctus efficitur.
        Aliquam eu suscipit diam. Etiam semper quis orci ac malesuada. Ut turpis
        ligula, porta vel metus eget, faucibus volutpat felis. Nunc a risus tellus.
        ',
    ],
    'crea_red' => [
        'displayName' => 'Creatif Redstone',
        'img' => asset('images/home/server-render.png'),
        'short-description' => '
            Fusce ac molestie tortor, nec suscipit dolor. Proin quis massa dapibus,
            tempus nisi ac, egestas urna. In non leo tincidunt, iaculis ex convallis,
            venenatis tellus.
        ',
        'description' => '
            Lorem ipsum dolor sit amet
        ',
    ],
    'survie' => [
        'displayName' => 'Survie',
        'img' => asset('images/home/server-render.png'),
        'short-description' => '
            Morbi sed nunc dictum, interdum elit at, vulputate turpis. Aenean
            at finibus magna. Aliquam mollis mollis tempus. Quisque suscipit
            fringilla elit.
        ',
        'description' => '
            https://bit.ly/3QTWxlk.
        ',
    ],
];
@endphp

<x-section id="servers" section-title="Serveurs" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="2">
    <div id="dynamic-height" class="duration-300">
        <div id="inner-height" class="flex flex-col sm:flex-row gap-16" x-data="{ open: '{{ $defaultKey }}' }">
            <div class="flex flex-col sm:w-1/2">
                @foreach ($servers as $key => $server)
                    <div class="cursor-pointer my-8 hover:scale-102 active:scale-100 duration-150"
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
            <div id="servers-list" class="sm:w-1/2 relative">
                @foreach ($servers as $key => $server)
                    <div class="server-description text-right w-full" x-show="open == '{{ $key }}'" x-cloak
                        x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                        x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-300 absolute top-0"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                        <h1 class="text-secondary">{{ $server['displayName'] }}</h1>
                        <p class="mt-8">{{ $server['description'] }}</p>
                        <img class="m-auto" alt="Image du serveur" src="{{ $server['img'] }}">
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
