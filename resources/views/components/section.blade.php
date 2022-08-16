@if ($attributes['wave'])
    <div class="w-full absolute -mt-40 h-40 bg-cover bg-center {{ $attributes['wave'] }}" style="-webkit-mask: url('{{ asset('images/waves/wave-1.svg') }}');"></div>
@endif

<section {{ $attributes->merge([
    'class' => 'section flex flex-col py-32 ' . $attributes['bg'] ?? '',
]) }}>


    <div class="mx-auto px-8 container md:max-w-screen-lg">

        {{-- Section title --}}
        @if ($attributes['title'])
            <div class="flex justify-center mb-16">
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
