@php
// TODO translate navigation menu names

$defaultKey = 'crea_build';

$servers = [
    'crea_build' => [
        'displayName' => 'Creatif Build',
        'img' => 'mc-img.jpeg',
        'short-description' => '
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Duis feugiat, ex ac cursus imperdiet, tortor dolor blandit diam,
            et imperdiet dui ex vitae odio. Fusce vel dolor ac turpis rutrum
            varius a at orci.
        ',
        'description' => '
            Ta mere
        '
    ],
    'crea_red' => [
        'displayName' => 'Creatif Redstone',
        'img' => 'mc-img.jpeg',
        'short-description' => '
            Fusce ac molestie tortor, nec suscipit dolor. Proin quis massa dapibus,
            tempus nisi ac, egestas urna. In non leo tincidunt, iaculis ex convallis,
            venenatis tellus. Quisque fringilla felis non ex suscipit, quis sagittis
            arcu luctus. Proin congue ligula non velit placerat, at congue eros
            dignissim. Nulla ut elit ac diam rhoncus accumsan.
        ',
        'description' => '
            Ta mere
        '
    ],
    'survie' => [
        'displayName' => 'Survie',
        'img' => 'mc-img.jpeg',
        'short-description' => '
            Morbi sed nunc dictum, interdum elit at, vulputate turpis. Aenean
            at finibus magna. Aliquam mollis mollis tempus. Quisque suscipit
            fringilla elit. In hac habitasse platea dictumst. Quisque hendrerit,
            arcu in scelerisque bibendum, quam leo gravida massa, sed gravida dui
            est vitae tortor.
        ',
        'description' => '
            Ta mere
        '
    ],
];
@endphp

<x-section id="servers" title="Serveurs">
    <div class="servers-viewer" x-data="{ open: '{{ $defaultKey }}' }">
        <div class="servers-list">
            @foreach ($servers as $key => $server)
            <div class="server" x-on:click="open = '{{ $key }}'">
                <h3 class="server-title">{{ $server['displayName'] }}</h3>
                <p class="server-text">
                    {{ $server['short-description'] }}
                </p>
                @if (!$loop->last)
                    <hr class="separator">
                @endif
            </div>
            @endforeach
        </div>
        @foreach ($servers as $key => $server)
        <div class="servers-detail" x-show="open == '{{ $key }}'">
            <p class="server-title">{{ $server['displayName'] }}</p>
            <p class="server-text">
            {{ $server['description'] }}
            </p>
            <img class="server-img" alt="Image du serveur " src="">
        </div>
        @endforeach
    </div>
</x-section>
