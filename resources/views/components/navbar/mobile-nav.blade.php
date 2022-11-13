<div class="lg:hidden">
    <!-- Hamburger -->
    <div class="items-center flex">
        <button @click="hamburgerClick" :class="{ 'absolute mr-8 right-0': mobileOpen, 'block': !mobileOpen }"
            class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 z-20">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <!-- Hamburger icon -->
                <path x-show="!mobileOpen && !languageMobile" class="inline-flex origin-center" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -rotate-45" x-transition:enter-end="opacity-100 rotate-0"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 rotate-0"
                    x-transition:leave-end="opacity-0 -rotate-45" />
                <!-- Cross icon -->
                <path x-show="mobileOpen" class="inline-flex origin-center" x-cloak stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"
                    x-transition:enter="transition ease-in duration-200" x-transition:enter-start="opacity-0 rotate-45"
                    x-transition:enter-end="opacity-100 rotate-0" x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 rotate-45" />
                <!-- Back icon -->
                <path x-show="languageOpen && languageMobile" class="inline-flex origin-center" x-cloak stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M 9 12 L 15 6 M 9 12 l 6 6"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -rotate-45" x-transition:enter-end="opacity-100 rotate-0"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 rotate-0"
                    x-transition:leave-end="opacity-0 -rotate-45" />
            </svg>
            <i class="fa-solid fa-xmark" x-show="languageOpen && !languageMobile"></i>
        </button>
    </div>

    <!-- Dropdown -->
    <div id="mobile-menu-content" x-show="mobileOpen" x-cloak
        class="bg-base-200/90 backdrop-blur-lg drop-shadow-lg absolute w-1/2 max-w-xs rounded-md right-6 top-2 z-10 flex lg:hidden overflow-hidden"
        x-transition:enter="transition out-expo duration-100"
        x-transition:enter-start="opacity-0 scale-90 translate-x-3.5 -translate-y-3"
        x-transition:enter-end="opacity-100 scale-100 translate-x-0 translate-y-0"
        x-transition:leave="transition in-expo duration-100"
        x-transition:leave-start="opacity-100 scale-100 translate-x-0 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-x-3.5 -translate-y-3">
        <div class="w-full">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" class="text-white hover:text-white no-underline block px-4 py-4">
                    {{ $link['name'] }}
                </a>
                {{-- @if (!$loop->last) --}}
                <hr class="text-base-100">
                {{-- @endif --}}
            @endforeach
            <div class="text-white hover:text-white bg-base-200 block px-4 py-4 cursor-pointer"
                @click="mobileOpen=false;languageOpen=true;languageMobile=true">
                <i class="fa-sharp fa-solid fa-earth-americas pr-4"></i> Langue
            </div>

        </div>

    </div>

</div>
