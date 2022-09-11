

<x-app-layout>

    <x-page-header section-title="Contact" />

    <x-section section-title="Formulaire de contact" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <p>En cas de doute sur l'utilisation de ce formulaire, des informations se trouvent plus bas dans la page.</p>
                <a href="#info" class="btn btn-primary">Plus d'infos</a>
                <hr class="white">
                <form action="#" id="contact-form" method="post" x-data="{ page: 'start', contactFrom: '' }">
                    {{-- First page --}}
                    <div x-show="page == 'start'">
                        <p>Vous nous contactez en tant que...</p>
                        <button type="button" class="btn btn-primary" x-on:click="page = 'informations'; contactFrom = 'player'; expandSection();">Joueur</button>
                        <button type="button" class="btn btn-primary" x-on:click="page = 'informations'; contactFrom = 'other'; expandSection();">Autre</button>
                    </div>
                    {{-- Form page --}}
                    <div x-show="page == 'informations'" x-cloak>
                        <button type="button" class="btn btn-primary" x-on:click="page = 'start'; expandSection();">Retour</button>
                        <input x-show="contactFrom == 'player'" type="text" placeholder="Pseudo Minecraft" class="input w-full max-w-xs" />
                        <input x-show="contactFrom == 'player'" type="text" placeholder="Identifiant Discord (Nom#0000)" class="input w-full max-w-xs" />
                        <input x-show="contactFrom == 'other'" type="email" placeholder="Adresse email" class="input w-full max-w-xs" />
                        <textarea class="textarea" placeholder="Message"></textarea>
                        <p class="text-secondary">Maximum 1500 charactères</p>
                    </div>
                    {{-- Message success --}}
                    <div x-show="page == 'success'" x-cloak>
                        <button type="button" x-on:click="page = 'start'; expandSection();">Retour</button>
                    </div>
                    {{-- Message error --}}
                    <div x-show="page == 'error'" x-cloak>
                        <button type="button" x-on:click="page = 'start'; expandSection();">Retour</button>
                    </div>
                    {{-- <div class="d-flex transition-container">
                        <!-- FIRST PAGE -->
                        <div class="transition-element contact-from position-absolute active">
                            <div class="h-100 d-flex align-items-center">
                                <div class="w-100">
                                    <p>Vous nous contactez en tant que...</p>
                                    <select name="request_type" class="custom-select form-control mb-3">
                                        <option value="player" selected>Un joueur</option>
                                        <option value="other">Autre</option>
                                    </select>
                                    <button type="button" class="btn btn-primary float-right" id="form-next-page">Suivant</button>
                                </div>
                            </div>
                        </div>
                        <!-- INFORMATIONS PAGE -->
                        <div class="transition-element contact-details">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mb-3" id="form-previous-page">Retour</button>
                                <div class="row inputs-player">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Pseudo Minecraft">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="discord_username" class="form-control"
                                            placeholder="Identifiant Discord (Nom#0000)">
                                    </div>
                                </div>
                                <div class="row inputs-other" style="display: none;">
                                    <div class="col mb-md-0">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Adresse email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-3" placeholder="Message" rows="10" cols="10" name="message"></textarea>
                                <em class="text-white-50">Maximum 1500 charactères</em>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="contact-validation font-weight-bold"></div>
                                    <div>
                                        <button type="submit" id="contact-form-submit" class="btn btn-primary btn-lg">Envoyer le message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    {% csrf_token %}
                </form>
            </div>
    </x-section>

    <x-section section-title="Informations" id="info" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="2">
        <div class="container">
            <p>Ce formulaire vous permet d'envoyer un message directement au staff de RedCraft.org. Le message sera envoyé aux administrateurs via Discord, pensez-donc à indiquer votre pseudo Discord si nécessaire.</p>
            <p>Vous pouvez utiliser ce formulaire pour les demande de unban, les plaintes, réclamations et demandes de partenariat.</p>
        </div>
    </x-section>
</x-app-layout>
