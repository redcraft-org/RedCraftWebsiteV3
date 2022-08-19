@php
// TailwindCSS's rules
$sectionClasses = 'section flex flex-col pb-52 pt-32 -mt-20 ';
// Apply custom colors if specified
$sectionClasses .= ($attributes['bg'] ?? '') . ' ' . ($attributes['text'] ?? '');
// Change margins and paddings if a wave transition is set in order to place it in the exact center of the sections
if ($attributes['wave-bg'] && $attributes['wave-id']) {
    $sectionClasses .= ' mt-0 pt-36 md:pt-20 lg:pt-12';
}
@endphp

{{-- Wave at the top of the section --}}
@if ($attributes['wave-bg'] && $attributes['wave-id'])
    <x-dynamic-component :component="'waves.wave-' . $attributes['wave-id']" bg="{{ $attributes['wave-bg'] }}" />
@endif

<section
    {{ $attributes->merge([
        'class' => $sectionClasses,
    ]) }}>


    <div class="mx-auto px-8 container md:max-w-screen-lg">

        {{-- Section title --}}
        @if ($attributes['section-title'])
            <div class="flex justify-center mb-16">
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
