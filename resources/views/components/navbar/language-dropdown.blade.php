<!-- Language selector dropdown -->
<div id="language-dropdown" x-show="languageOpen" x-cloak
    class="bg-base-200/90 backdrop-blur-lg drop-shadow-lg absolute w-1/2 max-w-xs rounded-md right-6 top-2 z-10 py-4 {{-- hidden lg:flex --}} flex"
    x-transition:enter="transition out-expo duration-100"
    x-transition:enter-start="opacity-0 scale-90 translate-x-3.5 -translate-y-3"
    x-transition:enter-end="opacity-100 scale-100 translate-x-0 translate-y-0"
    x-transition:leave="transition in-expo duration-100"
    x-transition:leave-start="opacity-100 scale-100 translate-x-0 translate-y-0"
    x-transition:leave-end="opacity-0 scale-90 translate-x-3.5 -translate-y-3">
    <div class="space-y-4 w-full">
        @foreach ($langs as $key => $lang)
            <p class="text-white hover:text-white no-underline block px-4">
                {{ $lang }}
            </p>
            @if (!$loop->last)
                <hr class="text-base-100">
            @endif
        @endforeach
    </div>
</div>
