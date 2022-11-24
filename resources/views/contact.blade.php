<x-app-layout>

    <x-page-header section-title="{{ __('contact.title') }}" />

    {{-- <x-contact.contact-form /> --}}
    <x-section section-title="{{ __('contact.form.title') }}" bg="bg-base-100" text="text-light" wave-bg="fill-base-100"
        wave-id="3">
        <div id="dynamic-height" class="duration-300">
            @livewire('contact-form')
        </div>
    </x-section>


    <x-section section-title="Informations" id="info" bg="bg-light" text="text-base-100" wave-bg="fill-light"
        wave-id="2">
        <div class="container">
            <div class="flex flex-col md:flex-row md:gap-8">
                <div class="flex flex-col gap-4 md:w-2/3">
                    <p>@lang('contact.information.description_1')</p>
                    <p>@lang('contact.information.description_2')</p>
                </div>
                <div class="grid items-center justify-items-center md:w-1/3">
                    <img src="{{ asset('images/contact/rcc-transparent.png') }}" alt="RedCraft chat logo" class="drop-shadow-2xl w-64">
                </div>

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
