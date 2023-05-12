@extends('admin.admin')

@section('title', $site->exists ? "Editer un site" : "Créer un site")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($site->exists ? 'admin.site.update' : 'admin.site.store') }}" method="POST">

        @csrf
        @method($site->exists ? 'PUT' : 'POST')

        <div class="row">
            <div class="col vstack gap-2">
                @include('shared.input', ['label' => 'Nom du site', 'name' => 'name', 'value' => $site->name])
                <div class="col row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Année', 'name' => 'year', 'value' => $site->year])
                    @include('shared.input', ['class' => 'col', 'name' => 'client', 'value' => $site->client])
                </div>
            </div>
            @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $site->description])
        </div>

        <div>
            <button class="btn btn-primary">
                @if($site->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
