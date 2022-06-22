<section {{ $attributes->merge([
    'class' => 'section flex flex-col',
]) }}>

    {{-- Section title --}}
    @if ($attributes['title'])
        <div class="flex justify-center mb-5">
            <h2 class="title">
                {{ $attributes['title'] }}
            </h2>
        </div>
    @endif

    <div class="section-content flex flex-col">
        {{ $slot }}
    </div>
    {{-- Section content --}}

</section>
