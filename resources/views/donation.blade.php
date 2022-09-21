<link rel="stylesheet" href="{{ mix('css/donation.css') }}">

<x-app-layout>

    <x-page-header section-title="Dons" />

    <x-section section-title="Faire un don" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">

        <div x-data="{ amount: 0 }" class="w-full flex flex-col">

            <input type="number" placeholder="Montant" class="input input-bordered w-full" x-model="amount" />

            <h5 class="mx-auto mb-4">Contreparties</h5>
            <ul class="steps steps-vertical lg:steps-horizontal" id="counterparties-steps">
                <li data-content="0€" class="step step-primary">VIP</li>
                <li data-content="8€" class="step" :class="{ 'step-primary': amount >= 8 }">VIP</li>
                <li data-content="15€" class="step" :class="{ 'step-primary': amount >= 15 }">VIP+</li>
            </ul>

        </div>

    </x-section>

</x-app-layout>
