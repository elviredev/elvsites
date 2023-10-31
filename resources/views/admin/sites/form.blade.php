@extends('admin.admin')

@section('title', $site->exists ? "Editer un site" : "Créer un site")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($site->exists ? 'admin.site.update' : 'admin.site.store', $site) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method($site->exists ? 'PUT' : 'POST')

        <div class="row d-flex flex-column flex-md-row">
            <div class="col-md-4 gap-2 flex-grow-1 h-100">
                @include('shared.input', ['class' => 'col', 'label' => 'Nom du site', 'name' => 'name', 'value' => $site->name])

                <div class="col row gap-2">
                    @include('shared.input', ['class' => 'col', 'label' => 'Année', 'name' => 'year', 'value' => $site->year])
                    @include('shared.input', ['class' => 'col', 'name' => 'client', 'value' => $site->client])
                </div>

                @include('shared.input', ['class' => 'mt-3', 'type' => 'textarea', 'name' => 'description', 'value' => $site->description])
                @include('shared.input', ['class' => 'mt-3', 'label' => 'URL du site', 'name' => 'url_site', 'value' => $site->url_site])

                <div class="col row mt-3">
                    @include('shared.checkbox', ['class' => 'col-md-2 col-sm-12 ms-3', 'label' => 'Publié', 'name' => 'published', 'value' => $site->published])
                    @include('shared.checkbox', ['class' => 'col-md-2 col-sm-12 ms-3', 'label' => 'Github', 'name' => 'github', 'value' => $site->github])
                </div>

                <div class="col-lg-6 col-md-12 row my-3">
                    @include('shared.select', ['class' => 'd-flex gap-2 ', 'name' => 'category_id', 'label' => 'Catégories', 'value' => $site->category()->pluck('id'), 'options' => $categories])
                </div>

                @include('shared.select-multiple', ['name' => 'technologies', 'label' => 'Technologies', 'value' => $site->technologies()->pluck('id'), 'multiple' => true, 'options' => $technologies])

                <div>
                    <button class="btn btn-primary mt-3">
                        @if($site->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </div>

            <div class="col-md-3 gap-3 mt-3  ">
                @foreach($site->pictures as $picture)
                    <div id="picture{{ $picture->id }}" class="position-relative">
                        <img src="{{ $picture->getImageUrl(360, 230) }}" alt="" class="w-100 d-block mt-2">
                        <button type="button"
                                class="btn btn-danger position-absolute bottom-0 start-0 w-100 py-1"
                                hx-delete="{{ route('admin.picture.destroy', $picture) }}"
                                hx-target="#picture{{ $picture->id }}"
                                hx-swap="delete"
                        >
                            <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Supprimer
                        </button>
                    </div>

                @endforeach
                @include('shared.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => true])
            </div>
        </div>
    </form>

@endsection
