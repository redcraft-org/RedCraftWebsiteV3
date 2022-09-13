<x-section section-title="Formulaire de contact" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
    {{-- <div class="mb-16">
            <p>En cas de doute sur l'utilisation de ce formulaire, des informations se trouvent plus bas dans la page.
            </p>
            <a href="#info" class="btn btn-secondary">Plus d'infos</a>
        </div> --}}

    <div id="dynamic-height" class="duration-300">
        <form action="#" id="contact-form" method="post" x-data="formComponent();" class="relative">


            {{-- First page --}}
            <div x-show="page == 'start'" x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
                <p class="mb-4">Vous nous contactez en tant que...</p>
                <div class="btn-group mx-auto flex justify-center">
                    <button type="button" class="btn btn-primary"
                        x-on:click="page = 'informations'; requestType = 'player'; expandSection();">Joueur</button>
                    <button type="button" class="btn btn-accent"
                        x-on:click="page = 'informations'; requestType = 'other'; expandSection();">Autre</button>
                </div>
            </div>


            {{-- Form page --}}
            <div x-show="page == 'informations'" class="flex flex-col gap-8" x-cloak
                x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
                x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
                <div>
                    <button type="button" class="btn btn-primary"
                        x-on:click="page = 'start'; expandSection();">Retour</button>
                </div>

                <div class="flex flex-row gap-8" x-show="requestType == 'player'">
                    <input type="text" name="username" placeholder="Pseudo Minecraft" class="input w-full" />
                    <input type="text" name="discord_username" placeholder="Identifiant Discord (Nom#0000)"
                        class="input w-full" />
                </div>

                <div class="flex flex-row" x-show="requestType == 'other'">
                    <input type="email" name="email" placeholder="Adresse email" class="input w-full" />
                </div>

                <div>
                    <textarea class="input textarea h-32 w-full" name="message" placeholder="Message"></textarea>
                    <p class="text-secondary">Maximum 1500 charactères</p>
                </div>


                <div class="flex justify-between">
                    <div class="contact-validation font-weight-bold text-error"></div>
                    <button type="submit" class="btn btn-lg btn-primary" wire:loading.attr="disabled">Envoyer le message</button>
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


@push('scripts')
    <script>
        /*********************************[ FORM ALPINE STATE ]***********************************/

        function formComponent() {
            return {
                page: 'start',
                requestType: ''
            };
        }

        /**********************************[ PAGES ANIMATION ]************************************/

        // The `inner-height` element sets the height from it's content
        // The `dynamic-height` element animates it with a transition
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

        /*********************************[ FORM VALIDATION ]************************************/


        /**
         * handler when the form is sent. Calls the validate function, set the final price in the "sum" element
         * and submits the form
         */
        function listenSubmit() {
            document.querySelector("#contact-form").addEventListener("submit", function(evt) {
                evt.preventDefault();

                stripForm();

                if (!validate()) {
                    return;
                }

                sendRequest(evt.target);
            })
        }

        /*
         * Clean form inputs
         */
        function stripForm() {
            const html_username = document.querySelector("input[name=username]");
            html_username.value = html_username.value.trim();

            const discord_username = document.querySelector("input[name=discord_username]");
            discord_username.value = discord_username.value.trim();

            const email = document.querySelector("input[name=email]");
            email.value = email.value.trim();

            const message = document.querySelector("textarea[name=message]");
            message.value = message.value.trim();
        }

        /**
         *   Validate form
         *   true -> no error
         *   array -> error messages
         *   By default, the function calls updateErrorMessage and updateErrorAnimation
         *   If showAnimation is false, updateErrorAnimation is not called
         *
         *   Return either true for no error
         *   either an array if there are errors
         *   [["errorMessage","element"],["errorMessage","element"],...]
         */
        function validate(showAnimation = true) {
            var returnValue = [];

            // Correct way to access an Alpine JS component's data?
            if (document.querySelector('#contact-form')._x_dataStack[0].requestType == "player") {

                // Nickname
                const username = document.querySelector("input[name=username]").value;
                if (username == "") {
                    returnValue.push(["input[name=username]", "Le pseudo Minecraft est requis"]);
                } else if (username.length < 4) {
                    returnValue.push(["input[name=username]", "Le pseudo Minecraft est trop court"]);
                } else if (username.match("^[a-zA-Z0-9_]{4,16}$") == null) {
                    returnValue.push(["input[name=username]", "Le pseudo Minecraft contient des charactères invalides"]);
                }

                // Discord username
                const discord_username = document.querySelector("input[name=discord_username]").value;
                if (!(discord_username === "") && discord_username.match("^.{3,32}#[0-9]{4}$") == null) {
                    returnValue.push(["input[name=discord_username]",
                        "Le pseudo Discord ne respecte pas le format abc#0000"
                    ]);
                }

            } else if (document.querySelector('#contact-form')._x_dataStack[0].requestType == "other") {

                // Email
                const email = document.querySelector("input[name=email]").value;
                // General Email Regex (RFC 5322 Official Standard)
                const regex =
                    /(?:[a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/g;
                if (email == "") {
                    returnValue.push(["input[name=email]", "L'email est requis"]);
                } else if (email.match(regex) == null) {
                    returnValue.push(["input[name=email]", "L'email ne respect pas le format d'une adresse mail"]);
                }
            }

            // Message
            const message = document.querySelector("textarea[name=message]").value;
            if (message == "") {
                returnValue.push(["textarea[name=message]", "Le message est requis"]);
            } else if (message.length < 30) {
                returnValue.push(["textarea[name=message]", "Le message est trop court"]);
            } else if (message.length > 1500) {
                returnValue.push(["textarea[name=message]", "Le message est trop long"]);
            }

            updateErrorMessage(returnValue);
            if (showAnimation) {
                updateErrorAnimation(returnValue);
            }

            if (returnValue.length == 0) {
                return true;
            }
            return false;
        }

        /**
         * Show error messages in span. Recieves the array from the validate function
         */
        function updateErrorMessage(messages) {
            document.querySelector(".contact-validation").innerHTML = "<ul>";
            messages.forEach(message => {
                document.querySelector(".contact-validation").innerHTML += "<li>" + message[1] + "</li>";
            });
            document.querySelector(".contact-validation").innerHTML += "</ul>";
        }

        /**
         * Shows error animation on input fields who are not valid
         * Recieves the array from the validate function
         */
        function updateErrorAnimation(messages) {
            messages.forEach(message => {
                document.querySelector(message[0]).classList.add("input-failed");
                setTimeout(() => {
                    document.querySelector(message[0]).classList.remove("input-failed");
                }, 1000);
            })
        }

        /**
         * Update the error messages if the inputs are changed
         */
        function listenUpdateErrorMessages() {
            document.querySelector("input[name=username]").oninput = function() {
                validate(false);
            };
            document.querySelector("input[name=discord_username]").oninput = function() {
                validate(false);
            };
            document.querySelector("input[name=email]").oninput = function() {
                validate(false);
            };
            document.querySelector("textarea[name=message]").oninput = function() {
                validate(false);
            };
        }

        listenSubmit();
        listenUpdateErrorMessages();
    </script>
@endpush
