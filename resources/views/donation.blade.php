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

        <div x-data="{ amount: 2, counterparty: '', anonyme: false, gift: false }" class="w-full flex flex-col">

            {{-- Formulaire --}}
            <div class="mb-4">

                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text">Montant en euros</span>
                    </label>
                    <label class="input-group">

                        <input type="number" placeholder="Montant" class="input input-bordered input-lg w-full"
                            x-model="amount" />
                        <span>€</span>
                    </label>
                </div>

                <p class="text-secondary mb-4">Si un don a déjà été fait, le prix des contreparties sera déduit pour la personne qui reçoit le don.</p>

                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <input type="text" placeholder="Pseudo Minecraft" class="input input-bordered w-full" x-bind:disabled="anonyme">
                    </div>
                    <div class="form-control">
                        <label class="cursor-pointer label">
                            <input type="checkbox" class="checkbox checkbox-light" x-model="anonyme" />
                            <span class="label-text ml-2">Anonyme</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <div class="form-control">
                            <label class="cursor-pointer">
                                <input type="checkbox" class="checkbox checkbox-light" x-model="gift" />
                                <span class="label-text ml-2">Ce don est un cadeau</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <input type="text" placeholder="Pseudo Minecraft du bénéficiaire" class="input input-bordered w-full" x-bind:disabled="!gift">
                    </div>
                </div>

                <textarea class="input textarea h-32 w-full mb-4" placeholder="Message"></textarea>

                <div class="flex gap-4 mb-4">
                    <input type="text" placeholder="Coupon" class="input max-w-xs mb-4" />
                    <button type="button" class="btn btn-secondary btn-outline">Appliquer le coupon</button>
                </div>



            </div>

            <h5 class="mx-auto mb-4">Contreparties</h5>
            <ul class="steps steps-vertical lg:steps-horizontal mb-4" id="counterparties-steps">
                <li data-amount="0" data-content="0€" class="step step-primary" @click="amount = 0;"></li>
                <li data-amount="8" data-content="8€" class="step" :class="{ 'step-primary': amount >= 8 }"
                    @click="amount = 8;"></li>
                <li data-amount="15" data-content="15€" class="step" :class="{ 'step-primary': amount >= 15 }"
                    @click="amount = 15;"></li>
            </ul>
            <div class="flex gap-x-12 mb-12">
                {{-- Extra spacing --}}
                <div class="w-full"></div>
                {{-- VIP card --}}
                <div class="card-counterparty" :class="{ 'available': amount >= 8, 'selected': counterparty == 'vip' }"
                    x-effect="amount < 8 && counterparty == 'vip' ? counterparty = '' : ''">
                    <div class="card-body">
                        <h2 class="card-title">Grade VIP</h2>
                        <p>Avec ce montant, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-outline btn-primary"
                                @click="counterparty = (counterparty == 'vip' ? '' : 'vip')"
                                x-bind:disabled="amount < 8">Sélectionner</button>
                        </div>
                    </div>
                </div>
                {{-- VIP+ card --}}
                <div class="card-counterparty"
                    :class="{ 'available': amount >= 15, 'selected': counterparty == 'vipp' }"
                    x-effect="amount < 15 && counterparty == 'vipp' ? counterparty = '' : ''">
                    <div class="card-body">
                        <h2 class="card-title">Grade VIP+</h2>
                        <p>Avec ce montant, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-outline btn-primary"
                                @click="counterparty = (counterparty == 'vipp' ? '' : 'vipp')"
                                x-bind:disabled="amount < 15">Sélectionner</button>
                        </div>
                    </div>
                </div>
            </div>




            <div class="flex justify-end">
                <button type="submit" class="btn btn-lg btn-primary">Faire un don</button>
            </div>

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
