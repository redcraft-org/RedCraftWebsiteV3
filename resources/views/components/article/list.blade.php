@php

$localizedPosts = [
    [
        'id' => 1,
        'created_at' => '2019-01-01',
        'updated_at' => '2019-01-01',
        'post_id' => 1,
        'language_id' => 1,
        'slug' => 'les-news-du-mois',
        'content' => '<p>Les news du mois</p>',
        'author' => 'John Doe',
        'title' => 'Les news du mois #7',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat nisl, blandit id nulla ut, auctor sagittis neque. Fusce eu nibh libero. Vivamus felis est, porttitor id iaculis non, pharetra sed est',
        'image' => ''
    ]
];

@endphp

<x-section id="articles-list" title="Les derniers articles">
    @foreach ($localizedPosts as $post)

    @endforeach
</x-section>
