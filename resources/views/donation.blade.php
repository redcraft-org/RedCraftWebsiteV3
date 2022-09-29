<link rel="stylesheet" href="{{ mix('css/donation.css') }}">

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('btnAmount', () => ({
                fromBtn: true,
                setAmount(amount) {
                    this.amount = amount;
                    this.fromBtn = true;
                }
            }))
        })
    </script>
@endpush

<x-app-layout>

    <x-page-header section-title="Dons" />

    <x-section section-title="Faire un don" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">

        <livewire:donation-form />

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
