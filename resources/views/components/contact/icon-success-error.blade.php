{{-- Parameters :
icon
- "success", draws a checkmark
- "error", draws a cross --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/icon-success-error.css') }}">
    @endpush
@endonce

<!-- Reference https://stackoverflow.com/questions/41078478/css-animated-checkmark -->
<svg class="icon-success-error my-4 {{ $attributes['icon'] }}"
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
