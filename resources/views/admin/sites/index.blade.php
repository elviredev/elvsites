@extends('admin.admin')

@section('title', 'Tous les sites')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>@yield('title')</h1>
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.site.create') }}" class="btn btn-primary">Ajouter un site</a>
        @endif
    </div>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Année</th>
                <th>Catégorie</th>
                @if(Auth::user()->role === 'admin')
                <th class="text-end">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
                <tr>
                    <td>{{ $site->name }}</td>
                    <td>{{ $site->description }}</td>
                    <td>{{ $site->year }}</td>
                    <td>
                        @if($site->category)
                            {{ $site->category?->name }}
                        @endif
                    </td>
                    @can("delete", $site)
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.site.edit', $site) }}" class="btn btn-info">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('admin.site.destroy', $site) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer ce site ?')">
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
    {{ $sites->links() }}

@endsection
