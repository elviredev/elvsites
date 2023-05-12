@extends('admin.admin')

@section('title', 'Tous les sites')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.site.create') }}" class="btn btn-primary">Ajouter un site</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Année</th>
                <th>Client</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
                <tr>
                    <td>{{ $site->name }}</td>
                    <td>{{ $site->description }}</td>
                    <td>{{ $site->year }}</td>
                    <td>{{ $site->client }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $sites->links() }}

@endsection
