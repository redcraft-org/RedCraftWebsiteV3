@php
// TODO translate navigation menu names
$servers = [
    [
        'name' => 'Creatif Build',
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
    [
        'name' => 'Creatif Redstone',
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
    [
        'name' => 'Survie',
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
    <div class="servers-viewer">
        <div class="servers-list">
            @foreach ($servers as $server)
            <div class="server">
                <h3 class="server-title">{{ $server['name'] }}</h3>
                <p class="server-text">
                    {{ $server['short-description'] }}
                </p>
            </div>
            @endforeach
        </div>
        <div class="servers-detail">
            <p class="server-title">Creatif Build</p>
            <p class="server-text">
                Vivamus erat sem, facilisis eu nulla non, porta mollis nibh.
                Duis ultricies dictum nibh in ullamcorper. Nulla porttitor blandit
                justo. Integer dapibus lorem sed massa gravida egestas. Vivamus eget
                ultrices lorem. Aenean malesuada pellentesque congue. Integer diam orci,
                lobortis nec nibh nec, convallis placerat leo.
            </p>
            <img class="server-img" alt="" src="">
        </div>
    </div>
</x-section>