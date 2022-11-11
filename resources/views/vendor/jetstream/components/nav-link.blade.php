@props(['active'])

@php
$classes = ($active ?? false)
            ? 'no-underline	nav-link active'
            : 'no-underline	nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
