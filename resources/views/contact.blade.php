<x-app-layout>

    <x-page-header section-title="Contact" />

    {{-- <x-contact.contact-form /> --}}
    <x-section section-title="Formulaire de contact" bg="bg-base-100" text="text-light" wave-bg="fill-base-100"
        wave-id="3">
        <div id="dynamic-height" class="duration-300">
            @livewire('contact-form')
        </div>
    </x-section>


    <x-section section-title="Informations" id="info" bg="bg-light" text="text-base-100" wave-bg="fill-light"
        wave-id="2">
        <div class="container">
            <p>Ce formulaire vous permet d'envoyer un message directement au staff de RedCraft.org. Le message sera
                envoyé aux administrateurs via Discord, pensez-donc à indiquer votre pseudo Discord si nécessaire.</p>
            <p>Vous pouvez utiliser ce formulaire pour les demande de unban, les plaintes, réclamations et demandes de
                partenariat.</p>
        </div>

        @push('scripts')
            <script>
                // The `inner-height` element sets the height from it's content
                // The `dynamic-height?` element animates it with a transition
                let innerElement = document.getElementById("contact-form");
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


    </x-section>
</x-app-layout>