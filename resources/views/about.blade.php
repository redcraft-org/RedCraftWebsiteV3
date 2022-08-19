{{-- <link rel="stylesheet" href="{{ mix('css/about.css') }}"> --}}

<x-app-layout>

    <x-page-header title="À Propos & FAQ" />

    <x-section section-title="À Propos" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <div class="flex flex-col md:flex-row md:gap-8">
            <div class="grid items-center md:w-1/3">
                <img src="{{ asset('images/red_white_grey_none_none_296.png') }}" alt="RedCraft.org Logo" class="mx-auto">
            </div>
            <div class="flex flex-col gap-4 md:w-2/3">
                <p><b>RedCraft.org est une infrastructure de serveurs Minecraft à but non lucratif ouvert en 2022.</b>
                </p>
                <p>Né de la fusion entre TopRed.fr et KingdomHills.fr, le projet RedCraft a
                    pour but de rassembler les communautés de joueurs Minecraft peu importe leur
                    origine. Grâce à un système de traduction en temps réel, les barrières du language
                    tombent et laissent place à une communauté soudée.</p>
                <p>L'entièretée du projet RedCraft.org est développé avec des outils modernes dans
                    l'objectif d'avoir une infrastructure flexible, tout en étant open source. Retrouvez
                    toutes les sources sur notre <a href="#" target="_blank">GitHub</a> !</p>
                <p><b>Se respecter, s'amuser, s'entraider</b>. Voilà notre credo qui garantit un
                    lieu d'apprentissage, de divertissement et de bon vivre.</p>
            </div>
        </div>
    </x-section>

    <x-section section-title="FAQ" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="1">
        <div class="flex flex-col gap-8">
            <div>
                <h5>Qu'est-ce que RedCraft.org ?</h5>
                <p>
                    RedCraft.org est une infrastructure de serveurs Minecraft multilingue.
                    Le projet rassemble plusieurs serveurs créatifs ou survie, le tout
                    étant complètement open source !</p>
            </div>
            <div>
                <h5>Comment fonctionne le projet ?</h5>
                <p>
                    L'entièreté du projet RedCraft.org est <em>open source</em>. Ce
                    qui veut dire que la totalité du projet a été crée dans un but
                    sans profit, personne ne se fait d'argent sur le projet !
                    D'ailleurs, <strong>un des objectifs principaux de RedCraft.org
                        est de s'autosuffire</strong>. L'argent généré par le projet
                    va uniquement pour son amélioration.
                </p>
            </div>
            <div>
                <h5>Comment aider au projet ?</h5>
                <p>
                    La façon la plus efficace de contribuer au projet est de venir
                    nous en parler ! Vous êtes intéressé.e à écrire du code, aider
                    à la construction du terrain ou participer à l'organisation ?
                    Prenez contact avec nous, que ça soit via le
                    <a href="#">formulaire de contact</a>, via
                    <a href="#" target="_blank">le Discord</a>
                    ou directement en jeu.
                </p>
            </div>
            <div>
                <h5>Quelle version le serveur supporte-t-il ?</h5>
                <p>
                    Le serveur est joignable à partir de la version
                    <strong>TODO</strong> jusqu'à
                    la version <strong>TODO</strong>.
                </p>
            </div>
            <div>
                <h5>Comment rejoindre le serveur sur Bedrock ?</h5>
                <p>
                    Les joueurs sur version Bedrock ne sont pas lésinés ! Pour rejoindre
                    RedCraft.org, vous avez besoin d'un compte Java. À la connexion au
                    serveur, les identifiants de votre compte Java vous seront demandés.
                    Remplissez le formulaire et vous êtes prêt à nous rejoindre en jeu.
                </p>
            </div>
        </div>
    </x-section>

    <x-section section-title="Licences & sources" bg="bg-primary" text="text-light" wave-bg="fill-primary" wave-id="2">
        <h4>Site web</h4>
        <ul>
            <li>
                <b>Django</b>
                : Cadre de développement web open source en Python ayant pour but de rendre le développement web 2.0
                simple et rapide.
                <a href="https://www.djangoproject.com/" target="_blank">Site web</a>
            </li>
            <li>
                <b>Bootstrap</b>
                : Collection d'outils utiles à la création du design de sites et d'applications web.
                <a href="https://getbootstrap.com/" target="_blank">Site web</a>
            </li>
            <li>
                <b>Font Awesome</b>
                : Police d'écriture et outil d'icônes qui se base sur CSS, LESS et SASS.
                <a href="https://fontawesome.com/" target="_blank">Site web</a> & <a
                    href="https://fontawesome.com/license" target="_blank">License</a>
            </li>
            <li>
                <b>Sal.js</b>
                : Librairie de scroll animé légère.
                <a href="https://mciastek.github.io/sal/" target="_blank">Site web</a>
            </li>
        </ul>
    </x-section>

</x-app-layout>
