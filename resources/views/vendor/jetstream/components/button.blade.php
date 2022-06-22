<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'btn btn-' . $attributes['type']
    ]) }}>
    {{ $slot }}
</button>
