<x-app-layout>

    <x-page-header section-title="Contact" />

    <x-section section-title="Formulaire de contact" bg="bg-base-100" text="text-light" wave-bg="fill-base-100"
        wave-id="3">
        <div class="mb-16">
            <p>En cas de doute sur l'utilisation de ce formulaire, des informations se trouvent plus bas dans la page.
            </p>
            {{-- <a href="#info" class="btn btn-secondary">Plus d'infos</a> --}}
        </div>

        <div id="dynamic-height" class="duration-300">
            <form action="#" id="contact-form" method="post" x-data="{ page: 'start', contactFrom: '' }" class="relative">


                {{-- First page --}}
                <div x-show="page == 'start'" x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <p class="mb-4">Vous nous contactez en tant que...</p>
                    <div class="btn-group mx-auto flex justify-center">
                        <button type="button" class="btn btn-primary"
                            x-on:click="page = 'informations'; contactFrom = 'player'; expandSection();">Joueur</button>
                        <button type="button" class="btn btn-accent"
                            x-on:click="page = 'informations'; contactFrom = 'other'; expandSection();">Autre</button>
                    </div>
                </div>


                {{-- Form page --}}
                <div x-show="page == 'informations'" class="flex flex-col gap-8" x-cloak
                    x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <div>
                        <button type="button" class="btn btn-primary"
                            x-on:click="page = 'start'; expandSection();">Retour</button>
                    </div>

                    <div class="flex flex-row gap-8" x-show="contactFrom == 'player'">
                        <input type="text" placeholder="Pseudo Minecraft" class="input w-full" />
                        <input type="text" placeholder="Identifiant Discord (Nom#0000)" class="input w-full" />
                    </div>

                    <div class="flex flex-row" x-show="contactFrom == 'other'">
                        <input type="email" placeholder="Adresse email" class="input w-full" />
                    </div>

                    <div>
                        <textarea class="input textarea h-32 w-full" placeholder="Message"></textarea>
                        <p class="text-secondary">Maximum 1500 charactères</p>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-lg btn-primary">Envoyer le message</button>
                    </div>
                </div>


                {{-- Message success --}}
                <div x-show="page == 'success'" x-cloak
                    x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <button type="button" x-on:click="page = 'start'; expandSection();">Retour</button>
                </div>


                {{-- Message error --}}
                <div x-show="page == 'error'" x-cloak
                    x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-100"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <button type="button" x-on:click="page = 'start'; expandSection();">Retour</button>
                </div>


                {{-- <div class="d-flex transition-container">


                        <!-- MODAL FAILED -->
                        <div class="contact-failed transition-element position-absolute">
                            <div class="h-100 d-flex align-items-center">
                                <div class="w-100">
                                    <h2>Erreur</h2>
                                    <p>Votre message n'a pas pu être traité</p>
                                    <p id="contact-failed-error" class="text-white-50">Pas de message d'erreur disponible</p>
                                    {% with icon="error" animation=0 %}
                                        {% include "website/components/icon-checkmark-cross.html" %}
                                    {% endwith %}
                                    <button type="button" class="btn btn-primary" id="form-restart">Réessayer</button>
                                </div>
                            </div>
                        </div>


                        <!-- MODAL SUCCESS -->
                        <div class="contact-success transition-element position-absolute">
                            <div class="h-100 d-flex align-items-center">
                                <div class="w-100">
                                    <h2>Terminé</h2>
                                    <p>Le message a été envoyé.</p>
                                    {% with icon="success" animation=0 %}
                                        {% include "website/components/icon-checkmark-cross.html" %}
                                    {% endwith %}
                                </div>
                            </div>
                        </div>
                    </div> --}}
                {{-- {% csrf_token %} --}}
            </form>
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
    </x-section>
</x-app-layout>


@push('scripts')
    <script>
        // The `inner-height` element sets the height from it's content
        // The `dynamic-height` element animates it with a transition
        let innerElement = document.getElementById("contact-form");
        let dynamicElement = document.getElementById('dynamic-height')

        function expandSection() {

            console.log("test");
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
