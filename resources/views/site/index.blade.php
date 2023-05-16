@extends('base')

@section('title', 'Tous les sites')

@section('content')

    <div class="bg-primary p-5 mb-5 text-center">
        <form action="" method="GET" class="container d-flex gap-2">
            <input type="text" placeholder="Mot clé" class="form-control" name="name" value="{{ $input['name'] ?? '' }}">
            <input type="number" placeholder="Année" class="form-control" name="year" value="{{ $input['year'] ?? '' }}">
            <select class="form-select" name="category" id="category" >
                <option value="">Catégories</option>
                @foreach($categories as $category)
                   <option @selected(old('category', $input['category'] ?? '' ) == $category->id) value="{{ $category->id  }}">
                       {{ $category->name }}
                   </option>
                @endforeach

            </select>
            <button class="btn btn-dark btn-sm">Rechercher</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach($sites as $site)
                <div class="col-md-4 mb-2">
                    @include('site.card')
                </div>
            @endforeach
        </div>

        <div class="my-4">
            {{ $sites->links() }}
        </div>
    </div>



@endsection
