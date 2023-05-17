@extends('base')

@section('title', $site->name)

@section('content')

    <div class="container my-4">
        <h1>{{ $site->name }}</h1>
        <h2>{{ $site->category?->name }} - {{ $site->year }}</h2>

        <hr>

        <div class="mt-4">
            <h4 class="py-2">Demander des infos sur ce template ?</h4>

            <form action="" method="POST" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                </div>

                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
                </div>

                @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Message'])

                <div>
                    <button class="btn btn-primary">Me Contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($site->description) !!}</p>

            <div class="row">
                <div class="col-8">
                    <h2 class="py-2">Informations</h2>
                    <table class="table table-secondary table-hover table-striped">
                        <tr>
                            <td>Catégorie</td>
                            <td>{{ $site->category?->name }}</td>
                        </tr>
                        <tr>
                            <td>Année de conception</td>
                            <td>{{ $site->year }}</td>
                        </tr>
                        <tr>
                            <td>Client</td>
                            <td>{{ $site->client }}</td>
                        </tr>
                        <tr>
                            <td>Publié</td>
                            <td>{{ $site->published ? 'Oui' : 'Non' }}</td>
                        </tr>
                        <tr>
                            <td>Github</td>
                            <td>{{ $site->github ? 'Oui' : 'Non' }}</td>
                        </tr>
                        <tr>
                            <td>URL du site</td>
                            <td>{{ $site->url_site ? $site->url_site : 'Non déployé' }}</td>
                        </tr>
                        <tr>
                            <td>Enregistré le </td>
                            <td>{{ \Carbon\Carbon::parse($site->created_at)->format('j-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2 class="py-2">Techno</h2>
                    <ul class="list-group">
                        @foreach($site->technologies as $technology)
                            <li class="list-group-item">
                                {{ $technology->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>



@endsection
