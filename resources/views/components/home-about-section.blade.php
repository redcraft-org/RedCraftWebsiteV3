@php
$postAPropos = [
    [
        'title' => 'Un serveur unique',
        'text' => 'Oubliez les barrières de language. Grâce à un service de traduction instantané, le serveur entier communique dans la langue de votre choix. RedCraft.org rassemble des personnes de n\'importe où dans le monde.',
        'imageLink' => 'https://i.pinimg.com/originals/22/72/86/22728606f9b1ffa813feb12b7f93e287.jpg',
    ],
    [
        'title' => 'Un staff compétent.',
        'text' => 'RedCraft.org a été conçu et pensé depuis le départ pour la flexibilité et la robustesse. L\'entièreté du projet est open source, n\'importe qui peut ainsi contribuer à développer le projet !',
        'imageLink' => 'https://i.pinimg.com/originals/22/72/86/22728606f9b1ffa813feb12b7f93e287.jpg',
    ],
    [
        'title' => 'Rejoignez-nous',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget feugiat lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis leo.Oubliez les barrières de language. Grâce à un service de traduction instantané, le serveur entier communique dans la langue de votre choix. RedCraft.org rassemble des personnes de n\'importe où dans le monde.',
        'imageLink' => 'https://i.pinimg.com/originals/22/72/86/22728606f9b1ffa813feb12b7f93e287.jpg',
    ],
];
@endphp

<x-section id="about" title="À propos">
    <div class="about-posts">
        @foreach ($postAPropos as $post)
            <x-home-about-section-row 
                title="{{ $post['title']}}"
                text="{{ $post['text']}}"
                image-link="{{ $post['imageLink']}}"
                class="{{ $loop->iteration % 2 ? 'reverse' : '' }}"
            />
        @endforeach
    </div>
</x-section>
