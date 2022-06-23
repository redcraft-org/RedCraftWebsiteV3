@php
$aPropos = [
    [
        'title' => 'Un serveur unique',
        'text' => 'Oubliez les barrières de language. Grâce à un service de traduction instantané, le serveur entier communique dans la langue de votre choix. RedCraft.org rassemble des personnes de n\'importe où dans le monde.',
        'image' => 'https://i.pinimg.com/originals/22/72/86/22728606f9b1ffa813feb12b7f93e287.jpg',
        'image-size' => 'bg-cover',
    ],
    [
        'title' => 'Un staff compétent.',
        'text' => 'RedCraft.org a été conçu et pensé depuis le départ pour la flexibilité et la robustesse. L\'entièreté du projet est open source, n\'importe qui peut ainsi contribuer à développer le projet !',
        'image' => 'https://i.pinimg.com/originals/22/72/86/22728606f9b1ffa813feb12b7f93e287.jpg',
        'image-size' => 'bg-cover',
    ],
    [
        'title' => 'Rejoignez-nous',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget feugiat lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis leo.',
        'image' => asset('images/home/people.png'),
        'image-size' => 'bg-contain',
    ],
];
@endphp

<x-section id="about" title="À propos">
    <div class="flex flex-col gap-y-16">
        @foreach ($aPropos as $e)
            <div
                {{ $attributes->merge([
                    'class' => 'flex justify-evenly gap-x-8 flex-col ' . ($loop->iteration % 2 ? 'md:flex-row-reverse' : 'md:flex-row'),
                ]) }}>

                {{-- Image --}}
                <div class="rounded-md shrink-0 w-96 h-64 mx-auto mb-4 md:mb-0 bg-no-repeat bg-center {{ $e['image-size'] }}"
                    style="background-image: url('{{ $e['image'] }}');"></div>

                {{-- Text --}}
                <div class="flex flex-col justify-center w-fit">
                    <h3>{{ $e['title'] }}</h3>
                    <p>{{ $e['text'] }}</p>
                </div>


            </div>
        @endforeach
    </div>
</x-section>
