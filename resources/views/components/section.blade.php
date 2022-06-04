<section
    {{ $attributes->merge([
        'class' => 'section flex flex-col'
    ]) }}>

    <div class="flex justify-center">
        <h2 class="title">
            {{ $attributes['title'] }}
        </h2>
    </div>

    {{ $slot }}

</section>
