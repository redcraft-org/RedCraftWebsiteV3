<div {{ $attributes->merge([
        'class' => 'post',
    ]) }}>
    <div class="post-text">
            <h3>
                {{ $attributes['title'] }}
            </h3>
            <p>
                {{ $attributes['text'] }}
            </p>
    </div>

    <div class="post-image">
        <img src={{ $attributes['image-link'] }}>
    </div>
</div>
