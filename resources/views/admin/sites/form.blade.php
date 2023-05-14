@extends('admin.admin')

@section('title', $site->exists ? "Editer un site" : "Créer un site")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($site->exists ? 'admin.site.update' : 'admin.site.store', $site) }}" method="POST">

        @csrf
        @method($site->exists ? 'PUT' : 'POST')

        <div class="row">
            <div class="col vstack gap-2">
                @include('shared.input', ['class' => 'col', 'label' => 'Nom du site', 'name' => 'name', 'value' => $site->name])

                <div class="col row gap-2">
                    @include('shared.input', ['class' => 'col', 'label' => 'Année', 'name' => 'year', 'value' => $site->year])
                    @include('shared.input', ['class' => 'col', 'name' => 'client', 'value' => $site->client])
                </div>
            </div>
            @include('shared.input', ['class' => 'mt-3', 'type' => 'textarea', 'name' => 'description', 'value' => $site->description])
            @include('shared.input', ['class' => 'mt-3', 'label' => 'URL du site', 'name' => 'url_site', 'value' => $site->url_site])

            <div class="col row mt-3">
                @include('shared.checkbox', ['class' => 'col-2 ms-3', 'label' => 'Publié', 'name' => 'published', 'value' => $site->published])
                @include('shared.checkbox', ['class' => 'col-2', 'label' => 'Github', 'name' => 'github', 'value' => $site->github])
            </div>
        </div>

        @include('shared.select', ['name' => 'category_id', 'label' => 'Catégories', 'value' => $site->category()->pluck('id'), 'options' => $categories])

        <div>
            <button class="btn btn-primary mt-2">
                @if($site->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
