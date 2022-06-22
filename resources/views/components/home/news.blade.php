<x-section id="about" title="À propos">
    <div class="about-posts">
        @foreach ($postAPropos as $post)
            <x-home.about-section-row title="{{ $post['title'] }}" text="{{ $post['text'] }}"
                image-link="{{ $post['imageLink'] }}" class="{{ $loop->iteration % 2 ? 'reverse' : '' }}" />
        @endforeach
    </div>
</x-section>
