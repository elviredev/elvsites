@extends('admin.admin')

@section('title', 'Technologies')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>@yield('title')</h1>
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.technology.create') }}" class="btn btn-primary">Ajouter une technologie</a>
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
            @foreach($technologies as $technology)
                <tr>
                    <td>{{ $technology->name }}</td>
                    @can("delete", $technology)
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.technology.edit', $technology) }}" class="btn btn-info">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.technology.destroy', $technology) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette technologie ?')">
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
    {{ $technologies->links() }}

@endsection
