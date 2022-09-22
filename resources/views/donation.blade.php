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

        <div x-data="{ amount: 0, counterparty: '' }" class="w-full flex flex-col">

            {{--  Formulaire --}}
            <input type="number" placeholder="Montant" class="input input-bordered input-lg w-full mb-24"
                x-model="amount" />

            <h5 class="mx-auto mb-4">Contreparties</h5>
            <ul class="steps steps-vertical lg:steps-horizontal mb-4" id="counterparties-steps">
                <li data-amount="0" data-content="0€" class="step step-primary" @click="amount = 0;"></li>
                <li data-amount="8" data-content="8€" class="step" :class="{ 'step-primary': amount >= 8 }"
                    @click="amount = 8;"></li>
                <li data-amount="15" data-content="15€" class="step" :class="{ 'step-primary': amount >= 15 }"
                    @click="amount = 15;"></li>
            </ul>
            <div class="flex gap-x-12">
                <div class="w-full"></div>
                <div class="card-counterparty" :class="{ 'available': amount >= 8, 'selected': counterparty == 'vip' }">
                    <div class="card-body">
                        <h2 class="card-title">Grade VIP</h2>
                        <p>Avec ce montant, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-outline btn-primary" @click="counterparty = (counterparty == 'vip' ? '' : 'vip')">Sélectionner</button>
                        </div>
                    </div>
                </div>
                <div class="card-counterparty"
                    :class="{ 'available': amount >= 15, 'selected': counterparty == 'vipp' }">
                    <div class="card-body">
                        <h2 class="card-title">Grade VIP+</h2>
                        <p>Avec ce montant, vous pouvez recevoir un grave <b>VIP</b> en retour.</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-outline btn-primary" @click="counterparty = (counterparty == 'vipp' ? '' : 'vipp')">Sélectionner</button>
                        </div>
                    </div>
                </div>
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
