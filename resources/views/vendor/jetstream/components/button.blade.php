<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'btn ' . $attributes['type']
    ]) }}>
    {{ $slot }}
</button>
