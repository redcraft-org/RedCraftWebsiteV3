<x-app-layout>

    <x-page-header section-title="{{ __('errors.404.title') }}" />

    <x-section section-title="{{ __('errors.404.section_title') }}" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-2/3">
                <p>@lang('errors.404.description_1')</p>
                <p>@lang('errors.404.description_2')</p>
                <ul>
                    <li><a href="{{ route('home') }}">@lang('errors.404.home')</a></li>
                    <li><a href="{{ route('contact') }}">@lang('errors.404.contact')</a></li>
                </ul>
            </div>
            <div class="md:w-1/3 grid items-center justify-items-center">
                <img src="{{ asset('images/coming_soon/page-not-found.png') }}" alt="RedCraft logo question mark" class="drop-shadow-2xl">
            </div>
        </div>
    </x-section>

</x-app-layout>
