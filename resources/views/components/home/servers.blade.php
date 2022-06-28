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
            Ta mere
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
            Ta mere
        ',
    ],
];
@endphp

<x-section id="servers" title="Serveurs">
    <div class="flex gap-16" x-data="{ open: '{{ $defaultKey }}' }">
        <div class="flex flex-col w-1/2">
            @foreach ($servers as $key => $server)
                <div class="cursor-pointer my-8" x-on:click="open = '{{ $key }}'">
                    <h4>{{ $server['displayName'] }}</h4>
                    <p>{{ $server['short-description'] }}</p>
                </div>
                @if (!$loop->last)
                    <hr class="separator">
                @endif
            @endforeach
        </div>
        <div class=" w-1/2">
            @foreach ($servers as $key => $server)
                <div class="text-right" x-show="open == '{{ $key }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 mt-4 scale-90"
                    x-transition:enter-end="opacity-100 mt-0 scale-100">
                    <h1 class="text-secondary">{{ $server['displayName'] }}</h1>
                    <p class="mt-8">{{ $server['description'] }}</p>
                    <img alt="Image du serveur " src="{{ $server['img'] }}">
                </div>
            @endforeach
        </div>
    </div>
</x-section>
