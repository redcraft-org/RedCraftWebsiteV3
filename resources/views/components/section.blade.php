<section {{ $attributes->merge([
    'class' => 'section flex flex-col py-32',
]) }}>
    <div class="mx-auto px-8 container md:max-w-screen-lg flex flex-col gap-y-16">

        {{-- Section title --}}
        @if ($attributes['title'])
            <div class="flex justify-center">
                <h4 class="title">
                    {{ $attributes['title'] }}
                </h4>
            </div>
        @endif

        {{-- Section content --}}
        <div class="flex flex-col">
            {{ $slot }}
        </div>

    </div>
</section>
