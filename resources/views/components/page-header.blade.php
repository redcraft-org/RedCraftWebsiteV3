<x-section class="page-header">
    <div class="flex justify-center">
        <h1 class="text-center title">
            {{ $attributes['section-title'] }}
        </h1>
    </div>
    @if (isset($description))
        <div class="flex justify-center p-4 mt-8">
            {{ $description }}
        </div>
    @endif
</x-section>
