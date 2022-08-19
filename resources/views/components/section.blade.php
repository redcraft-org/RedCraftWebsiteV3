
{{-- Wave at the top of the section --}}
@if ($attributes['wave-bg'] && $attributes['wave-id'])
    <x-dynamic-component :component="'waves.wave-' . $attributes['wave-id']" bg="{{ $attributes['wave-bg'] }}" />
@endif

<section
    {{ $attributes->merge([
        'class' => 'section flex flex-col py-32 ' . ($attributes['bg'] ?? '') . ' ' . ($attributes['text'] ?? ''),
    ]) }}>


    <div class="mx-auto px-8 container md:max-w-screen-lg">

        {{-- Section title --}}
        @if ($attributes['section-title'])
            <div class="flex justify-center mb-16 text-center">
                <h4 class="title">
                    {{ $attributes['section-title'] }}
                </h4>
            </div>
        @endif

        {{-- Section content --}}
        <div class="flex flex-col">
            {{ $slot }}
        </div>


    </div>
</section>
