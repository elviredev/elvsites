@extends('base')

@section('title', $site->name)

@section('content')

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 500px;">
                    <div class="carousel-inner">
                        @foreach($site->pictures as $k => $picture)
                            <div class="carousel-item {{ $k === 0 ? 'active' : '' }}">
                                <img src="{{ $picture->getImageUrl(500, 300) }}" alt="image a la une">
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 ">
                <h1 class="mt-lg-0 mt-3">{{ $site->name }}</h1>
                <h2>{{ $site->category?->name }} - {{ $site->year }}</h2>

                <hr>

                <div class="mt-4">
                    <h4 class="py-2">Demander des infos sur ce template ?</h4>

                    @include('shared.flash')

                    <form action="{{ route('site.contact', $site) }}" method="POST" class="vstack gap-3">
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
            </div>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($site->description) !!}</p>

            <div class="row">
                <div class="col-lg-8 col-sm-12">
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
                <div class="col-lg-4 col-sm-12">
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
