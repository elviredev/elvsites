@extends('admin.admin')

@section('title', $technology->exists ? "Editer une technologie" : "Créer une technologie")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($technology->exists ? 'admin.technology.update' : 'admin.technology.store', $technology) }}" method="POST">

        @csrf
        @method($technology->exists ? 'PUT' : 'POST')

        @include('shared.input', ['label' => 'Nom de la technologie', 'name' => 'name', 'value' => $technology->name])

        <div>
            <button class="btn btn-primary mt-2">
                @if($technology->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
