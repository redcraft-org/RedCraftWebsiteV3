<link rel="stylesheet" href="{{ mix('css/donation.css') }}">

@push('scripts')
    <script>
        const counterpartiesSteps = document.querySelectorAll('[data-amount]')
        counterpartiesSteps.forEach((step, i) => {
            // trucs
        });
    </script>
@endpush

<x-app-layout>

    <x-page-header section-title="Dons" />

    <x-section section-title="Faire un don" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">

        <div x-data="{ amount: '', counterparty: '', anonyme: false, gift: false }" class="w-full flex flex-col">

            {{-- Formulaire --}}
            <div class="mb-14">

                <div class="form-control mb-8">
                    <label class="label">
                        <span class="label-text">Choisissez le montant</span>
                    </label>
                    <div class="input-group">
                        <button x-cloak :class="amount == 5 ? 'btn-primary' : 'bg-base-200 hover:bg-base-100'" class="text-light border-none w-1/6 btn btn-lg"
                            @click="amount = 5">5€</button>
                        <button x-cloak :class="amount == 8 ? 'btn-primary' : 'bg-base-200 hover:bg-base-100'" class="text-light border-none w-1/6 btn btn-lg"
                            @click="amount = 8">8€</button>
                        <button x-cloak :class="amount == 15 ? 'btn-primary' : 'bg-base-200 hover:bg-base-100'" class="text-light border-none w-1/6 btn btn-lg"
                            @click="amount = 15">15€</button>
                        <button x-cloak :class="amount == 20 ? 'btn-primary' : 'bg-base-200 hover:bg-base-100'" class="text-light border-none w-1/6 btn btn-lg"
                            @click="amount = 20">20€</button>
                        <input type="number" placeholder="Autre montant"
                            class="w-2/6 input input-lg text-right input-borderless" x-model="amount" />
                        <span>€</span>
                    </div>
                </div>

                <p class="text-secondary mb-8">Si un don a déjà été fait, le prix des contreparties sera déduit pour la
                    personne qui reçoit le don.</p>

                <div class="flex gap-4 mb-8 flex-col-reverse md:flex-row">
                    <div class="w-full">
                        <input type="text" placeholder="Pseudo Minecraft" class="input w-full"
                            x-bind:disabled="anonyme">
                    </div>
                    <div class="w-full flex items-center">
                        <div class="form-control">
                            <label class="cursor-pointer label">
                                <input type="checkbox" class="checkbox checkbox-light" x-model="anonyme" />
                                <span class="label-text ml-2">Anonyme</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 mb-8 flex-col md:flex-row">
                    <div class="w-full flex items-center">
                        <div class="form-control">
                            <label class="cursor-pointer">
                                <input type="checkbox" class="checkbox checkbox-light" x-model="gift" />
                                <span class="label-text ml-2">Ce don est un cadeau</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-full">
                        <input type="text" placeholder="Pseudo Minecraft du bénéficiaire"
                            class="input w-full" x-bind:disabled="!gift">
                    </div>
                </div>

                <textarea class="input textarea h-32 w-full mb-8" placeholder="Message (optionnel)"></textarea>

                <div class="flex gap-4 mb-8 flex-col md:flex-row">
                    <input type="text" placeholder="Coupon" class="input max-w-xs" />
                    <button type="button" class="btn btn-secondary btn-outline">Appliquer le coupon</button>
                </div>

                {{-- <p class="text-success">Le coupon a été appliqué !</p> --}}

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-lg btn-primary">Faire un don</button>
                </div>
            </div>

            <h5 class="mx-auto mb-4">Contreparties</h5>
            <ul class="steps steps-vertical lg:steps-horizontal mb-4" id="counterparties-steps">
                <li data-amount="0" data-content="0€" class="step step-primary"></li>
                <li data-amount="8" data-content="8€" class="step" :class="{ 'step-primary': amount >= 8 }">
                    {{-- VIP card --}}
                    <div class="card-counterparty"
                        :class="{ 'available': amount >= 8, 'selected': counterparty == 'vip' }"
                        x-effect="amount < 8 && counterparty == 'vip' ? counterparty = '' : ''">
                        <div class="card-body">
                            <h2 class="card-title">Grade VIP</h2>
                            <p>Avec un don de minimum 8€, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-outline btn-primary"
                                    @click="counterparty = (counterparty == 'vip' ? '' : 'vip')"
                                    x-bind:disabled="amount < 8">Sélectionner</button>
                            </div>
                        </div>
                    </div>
                </li>
                <li data-amount="15" data-content="15€" class="step" :class="{ 'step-primary': amount >= 15 }">
                    {{-- VIP+ card --}}
                    <div class="card-counterparty"
                        :class="{ 'available': amount >= 15, 'selected': counterparty == 'vipp' }"
                        x-effect="amount < 15 && counterparty == 'vipp' ? counterparty = '' : ''">
                        <div class="card-body">
                            <h2 class="card-title">Grade VIP+</h2>
                            <p>Avec un don de minimum 15€, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-outline btn-primary"
                                    @click="counterparty = (counterparty == 'vipp' ? '' : 'vipp')"
                                    x-bind:disabled="amount < 15">Sélectionner</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </x-section>

    <x-section section-title="Informations" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="2">

        <div class="mb-4">
            <p>RedCraft.org est un projet complètement <b>Open Source</b> et à but <b>non-lucratif</b>. Cependant,
                maintenir une infrastructure de jeu a un coût et les personnes travaillant sur le projet <b>payent ces
                    frais de leur poche</b>.En faisant un don, <b>vous contribuez directement au financement du
                    projet</b> et vous garantissez un avenir pour RedCraft.org !</p>
            <p class="lead">Merci !</p>
        </div>
        <h4 class="mt-4 mb-4">Contreparties</h4>
        <div class="contreparties row justify-content-around">
            <div class="card contrepartie vip col-lg-4 col-md-5 col-sm-12 mx-3 mx-md-0">
                <div class="card-body">
                    <h3 class="card-title">VIP</h3>
                </div>
            </div>
            <div class="card contrepartie red-vip col-lg-4 col-md-5 col-sm-12 mx-3 mx-md-0">
                <div class="card-body">
                    <h3 class="card-title">RedVIP</h3>
                </div>
            </div>
        </div>

    </x-section>

</x-app-layout>
