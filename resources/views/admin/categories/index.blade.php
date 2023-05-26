@extends('admin.admin')

@section('title', 'Catégories')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>@yield('title')</h1>
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
        @endif
    </div>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                @if(Auth::user()->role === 'admin')
                <th class="text-end">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    @can("delete", $category)
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-info">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.category.destroy', $category) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette catégorie ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $categories->links() }}

@endsection
