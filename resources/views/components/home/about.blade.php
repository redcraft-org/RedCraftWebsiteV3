@php
$aPropos = [
    [
        'title' => __('home.about.1.title'),
        'text' => __('home.about.1.description'),
        'image' => asset('images/home/about-1.jpg'),
        'image-size' => 'bg-cover',
    ],
    [
        'title' => __('home.about.2.title'),
        'text' => __('home.about.2.description'),
        'image' => asset('images/home/about-2.jpg'),
        'image-size' => 'bg-cover',
    ],
    [
        'title' => __('home.about.3.title'),
        'text' => __('home.about.3.description'),
        'image' => asset('images/home/about-3.png'),
        'image-size' => 'bg-contain',
    ],
];
@endphp

<x-section id="about" section-title="À propos" bg="bg-base-100" text="text-light" wave-bg="fill-base-100" wave-id="3">
    <div class="flex flex-col gap-y-16">
        @foreach ($aPropos as $e)
            <div x-data="{ shown: false }" x-intersect.half="shown = true">
                <div :class="shown ? 'opacity-100' : 'opacity-0 translate-y-8'"
                    {{ $attributes->merge([
                        'class' => 'flex justify-evenly gap-x-8 flex-col duration-1000 delay-300 ' . ($loop->iteration % 2 ? 'md:flex-row-reverse' : 'md:flex-row'),
                    ]) }} x-cloak>

                    {{-- Image --}}
                    <div class="rounded-md shrink-0 w-full sm:w-96 h-64 mx-auto mb-4 md:mb-0 bg-no-repeat bg-center {{ $e['image-size'] }}"
                        style="background-image: url('{{ $e['image'] }}');"></div>

                    {{-- Text --}}
                    <div
                        class="flex flex-col justify-center w-fit {{ $loop->iteration % 2 ? 'md:text-right' : 'md:text-left' }}">
                        <h3>{{ $e['title'] }}</h3>
                        <p>{{ $e['text'] }}</p>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
</x-section>
