<x-app-layout>

    <x-page-header section-title="{{ trans('coming-soon.title') }}" />

    <x-section section-title="{{ trans('coming-soon.main.title.1') . Request::segment(1) . trans('coming-soon.main.title.2') }}" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-2/3">
                <p>@lang('coming-soon.main.description.1')</p>
                <p>@lang('coming-soon.main.description.2')</p>
                <ul>
                    <li><a href="{{ route('home') }}">@lang('coming-soon.main.description.3.1')</a></li>
                    <li><a href="{{ route('contact') }}">@lang('coming-soon.main.description.3.2')</a></li>
                </ul>
            </div>
            <div class="md:w-1/3 grid items-center justify-items-center">
                <img src="{{ asset('images/page-not-found.png') }}" alt="RedCraft logo question mark">
            </div>
        </div>
    </x-section>

</x-app-layout>
