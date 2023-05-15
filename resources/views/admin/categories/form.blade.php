@extends('admin.admin')

@section('title', $category->exists ? "Editer une catégorie" : "Créer une catégorie")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store', $category) }}" method="POST">

        @csrf
        @method($category->exists ? 'PUT' : 'POST')

        @include('shared.input', ['label' => 'Nom de la catégorie', 'name' => 'name', 'value' => $category->name])

        <div>
            <button class="btn btn-primary mt-2">
                @if($category->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
