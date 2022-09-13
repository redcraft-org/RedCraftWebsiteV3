{{-- Parameters :
icon
- "success", draws a checkmark
- "error", draws a cross
animation
- 0, don't animate, the icon won't appear.
    In order to show it, a JS function must add the "checkmark-animation" class
    to the ".checkmark" element when the animation should play
- 1, show the icon with an animation when the page is loaded --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/icon-checkmark-cross.css') }}">
    @endpush
@endonce

<!-- Reference https://stackoverflow.com/questions/41078478/css-animated-checkmark -->
<svg class="checkmark my-4 {{ $attributes['icon'] }}"
    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />

    @if ($attributes['icon'] === 'success')
        <path class="checkmark-icon" fill="none" d="M 14.1 27.2l7.1 7.2 16.7-16.8" />
    @endif

    @if ($attributes['icon'] === 'error')
        <path class="checkmark-icon" fill="none" d="M 17 17 l 18 18" />
        <path class="checkmark-icon" fill="none" d="M 35 17 l -18 18" />
    @endif
</svg>
