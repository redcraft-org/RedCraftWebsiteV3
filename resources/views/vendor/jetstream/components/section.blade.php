<section
    {{ $attributes->merge([
        'id' => $attributes['id']
        'class' => 'section'
    ]) }}>
    {{ $slot }}
</section>
