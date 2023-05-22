<div class="card mb-3">

    @if($site->getPicture())
        <img src="{{ $site->getPicture()->getImageUrl(360, 230) }}" alt="" class="w-100">
    @else
        <img src="/empty.jpg" alt="" class="w-100">
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
            <h5 class="card-title">
                <a href="{{ route('site.show', ['slug' => $site->getSlug(), 'site' => $site]) }}">{{ $site->name }}</a>
            </h5>

            @if($site->published)
                <span class="badge bg-primary">Publié</span>
            @endif
        </div>

        <p class="card-text">
            {{ $site->year }}
        </p>

        @if($site->category)
            <div class="text-info fw-bold">
            {{ $site->category?->name }}
            </div>
        @endif

    </div>
</div>
