@php
$aPropos = [
    [
        'title' => 'Un serveur unique',
        'text' => 'Oubliez les barrières de language. Grâce à un service de traduction instantané, le serveur entier communique dans la langue de votre choix. RedCraft.org rassemble des personnes de n\'importe où dans le monde.',
        'image' => asset('images/home/castle.jpg'),
        'image-size' => 'bg-cover',
    ],
    [
        'title' => 'Un staff compétent.',
        'text' => 'RedCraft.org a été conçu et pensé depuis le départ pour la flexibilité et la robustesse. L\'entièreté du projet est open source, n\'importe qui peut ainsi contribuer à développer le projet !',
        'image' => asset('images/home/library.jpg'),
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

<x-section id="about" title="À propos" bg="bg-base-100" text="text-light" wave="3">
    <div class="flex flex-col gap-y-16">
        @foreach ($aPropos as $e)
            <div x-data="{ shown: false }" x-intersect.half="shown = true">
                <div :class="shown ? 'opacity-100' : 'opacity-0 translate-y-8'"
                    {{ $attributes->merge([
                        'class' => 'flex justify-evenly gap-x-8 flex-col duration-1000 delay-300 ' . ($loop->iteration % 2 ? 'md:flex-row-reverse' : 'md:flex-row'),
                    ]) }} x-cloak>

                    {{-- Image --}}
                    <div class="rounded-md shrink-0 w-full sm:w-96 h-64 mx-auto mb-4 md:mb-0 bg-no-repeat bg-center {{ $e['image-size'] }}"
                        style="background-image: url('{{ $e['image'] }}');"></div>

                    {{-- Text --}}
                    <div
                        class="flex flex-col justify-center w-fit {{ $loop->iteration % 2 ? 'md:text-right' : 'md:text-left' }}">
                        <h3>{{ $e['title'] }}</h3>
                        <p>{{ $e['text'] }}</p>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
</x-section>
