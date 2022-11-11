<x-section id="news" title="{{  __('home.news.title') }}">
    <div class="flex flex-row gap-8">
        <div class="shadow-xl card w-96 bg-neutral text-base-100">
            <img src="https://placeimg.com/400/225/arch" alt="Shoes" />
            <div class="card-body">
                <h2 class="card-title">@lang('home.news.1.title')</h2>
                <p>@lang('home.news.1.description')</p>
                <div class="justify-end card-actions">
                    <button class="btn btn-primary">@lang('home.news.1.button')</button>
                </div>
            </div>
        </div>
        <div class="shadow-xl card w-96 bg-neutral text-base-100">
            <img src="https://placeimg.com/400/225/arch" alt="Shoes" />
            <div class="card-body">
                <h2 class="card-title">@lang('home.news.2.title')</h2>
                <p>@lang('home.news.2.description')</p>
                <div class="justify-end card-actions">
                    <button class="btn btn-primary">@lang('home.news.2.button')</button>
                </div>
            </div>
        </div>
        <div class="shadow-xl card w-96 bg-neutral text-base-100">
            <img src="https://placeimg.com/400/225/arch" alt="Shoes" />
            <div class="card-body">
                <h2 class="card-title">@lang('home.news.3.title')</h2>
                <p>@lang('home.news.3.description')</p>
                <div class="justify-end card-actions">
                    <button class="btn btn-primary">@lang('home.news.3.button')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 text-right">
        <a href="#"><i class="fa-solid fa-arrow-right"></i> @lang('home.news.see_more')</a>
    </div>
</x-section>
