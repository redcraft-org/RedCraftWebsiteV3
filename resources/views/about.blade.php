<x-app-layout>

    <x-page-header section-title="{{ trans('about.title') }}" />

    <x-section section-title="{{ trans('about.about.title') }}" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
        <div class="flex flex-col md:flex-row md:gap-8">
            <div class="grid items-center md:w-1/3">
                <img src="{{ asset('images/red_white_grey_none_none_296.png') }}" alt="RedCraft.org Logo" class="mx-auto">
            </div>
            <div class="flex flex-col gap-4 md:w-2/3">
                <p>
                    <b>@lang('about.about.1')</b>
                </p>
                <p>
                    @lang('about.about.2')</p>
                <p>
                    @lang('about.about.3.1')
                    <a href="{{ config('services.github-organization-url') }}" target="_blank">@lang('about.about.3.2')</a>
                    @lang('about.about.3.3')
                </p>
                <p>
                    <b>@lang('about.about.4.1')</b>.
                    @lang('about.about.4.2')
                </p>
            </div>
        </div>
    </x-section>

    <x-section section-title="{{ trans('about.faq.title') }}" bg="bg-light" text="text-base-100" wave-bg="fill-light" wave-id="1">
        <div class="flex flex-col gap-8">
            <div>
                <h5>@lang('about.faq.1.title')</h5>
                <p>@lang('about.faq.1.description')</p>
            </div>
            <div>
                <h5>@lang('about.faq.2.title')</h5>
                <p>
                    @lang('about.faq.2.description.1')
                    <em>@lang('about.faq.2.description.2')</em>
                    @lang('about.faq.2.description.3')
                    <strong>@lang('about.faq.2.description.4')</strong>
                    @lang('about.faq.2.description.5')
                </p>
            </div>
            <div>
                <h5>@lang('about.faq.3.title')</h5>
                <p>
                    @lang('about.faq.3.description.1')
                    <a href="{{ route('contact') }}">@lang('about.faq.3.description.2')</a>
                    @lang('about.faq.3.description.3')
                    <a href="{{ config('services.discord-invite-url') }}" target="_blank">@lang('about.faq.3.description.4')</a>
                    @lang('about.faq.3.description.5')
                </p>
            </div>
            <div>
                <h5>@lang('about.faq.4.title')</h5>
                <p>
                    @lang('about.faq.4.description.1')
                    <strong>{{ reset(McHelper::getVersions()['supportedVersions']) }}</strong>
                    @lang('about.faq.4.description.2')
                    <strong>{{ end(McHelper::getVersions()['supportedVersions']) }}</strong>
                    @lang('about.faq.4.description.3')
                </p>
            </div>
            <div>
                <h5>@lang('about.faq.5.title')</h5>
                <p>
                    @lang('about.faq.5.description')
                </p>
            </div>
        </div>
    </x-section>

    <x-section section-title="{{ trans('about.licenses.title') }}" bg="bg-primary" text="text-light" wave-bg="fill-primary"
        wave-id="2">
        <h4>@lang('about.licenses.1.title')</h4>
        <ul>
            <li>
                <b>Laravel</b>@lang('about.licenses.1.description.laravel')
                <a href="https://laravel.com/" target="_blank">@lang('about.licenses.1.website')</a>
            </li>
            <li>
                <b>Livewire</b>@lang('about.licenses.1.description.livewire')
                <a href="https://laravel-livewire.com/" target="_blank">@lang('about.licenses.1.website')</a>
            </li>
            <li>
                <b>Tailwindcss</b>@lang('about.licenses.1.description.tailwind')
                <a href="https://tailwindcss.com/" target="_blank">@lang('about.licenses.1.website')</a>
            </li>
            <li>
                <b>Alpine.JS</b>@lang('about.licenses.1.description.alpine')
                <a href="https://alpinejs.org/" target="_blank">@lang('about.licenses.1.website')</a>
            </li>
            <li>
                <b>SASS</b>@lang('about.licenses.1.description.sass')
                <a href="https://sass-lang.com/" target="_blank">@lang('about.licenses.1.website')</a>
            </li>
            <li>
                <b>Font Awesome</b>@lang('about.licenses.1.description.fontawesome')
                <a href="https://fontawesome.com/" target="_blank">@lang('about.licenses.1.website')</a>
                @lang('about.licenses.1.and')
                <a href="https://fontawesome.com/license" target="_blank">@lang('about.licenses.1.license')</a>
            </li>
        </ul>
    </x-section>

</x-app-layout>
