<div id="language-dropdown" x-show="languageOpen" x-cloak x-data="{ ...languageSwitcher }"
    class="absolute z-10 flex w-1/2 max-w-xs rounded-md bg-base-200/90 backdrop-blur-lg drop-shadow-lg right-6 top-2"
    x-transition:enter="transition out-expo duration-100"
    x-transition:enter-start="opacity-0 scale-90 translate-x-3.5 -translate-y-3"
    x-transition:enter-end="opacity-100 scale-100 translate-x-0 translate-y-0"
    x-transition:leave="transition in-expo duration-100"
    x-transition:leave-start="opacity-100 scale-100 translate-x-0 translate-y-0"
    x-transition:leave-end="opacity-0 scale-90 translate-x-3.5 -translate-y-3">
    <div class="w-full">
        @foreach ($langs as $key => $lang)
            <div class="block px-4 py-4 text-white no-underline cursor-pointer hover:text-white"
                @click="setLanguage('{{ $key }}')">
                <div x-text=countryCodeToFlag(languageCodeToCountryCode('{{ $key }}'))></div><span class="flag"></span>{{ $lang }}
            </div>
            @if (!$loop->last)
                <hr class="text-base-100">
            @endif
        @endforeach
    </div>
</div>

@once
    @push('scripts')
        <script>
            window.languageSwitcher = {
                setLanguage(value) {
                    var date = new Date();
                    date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toUTCString();
                    document.cookie = 'language' + "=" + (value || "") + expires + "; path=/";

                    window.location.reload();
                },
                languageCodeToCountryCode(languageCode) {
                    const array = {
                        'fr': 'fr',
                        'en': 'gb',
                        'de': 'de',
                        'es': 'es',
                        'it': 'it',
                    };
                    return array[languageCode] ?? '__';
                },
                countryCodeToFlag(code) {
                    return code
                        .toUpperCase()
                        .replace(/./g, char => String.fromCodePoint(char.charCodeAt(0) + 127397));
                },
            }
        </script>
    @endpush
@endonce
