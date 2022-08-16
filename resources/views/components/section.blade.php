{{-- SVG Wave --}}
{{-- @if ($attributes['wave'] && $attributes['bg'])
    <div class="w-full absolute -mt-40 h-40 bg-cover bg-center {{ $attributes['bg'] }}"
        style="-webkit-mask: url('{{ asset('images/waves/wave-' . $attributes['wave'] . '.svg') }}');">
    </div>
@endif --}}

@php
$waveComponent = $attributes['wave-id'];
@endphp

@if ($attributes['wave-bg'] && $attributes['wave-id'])
    <x-dynamic-component :component="'waves.wave-' . $attributes['wave-id']" bg="{{ $attributes['wave-bg'] }}" />
@endif

<section
    {{ $attributes->merge([
        'class' => 'section flex flex-col py-32 ' . ($attributes['bg'] ?? '') . ' ' . ($attributes['text'] ?? ''),
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
