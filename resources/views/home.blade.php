@extends('base')

@section('title', 'Derniers sites')

@section('content')

    <div class="bg-dark p-5 mb-5 text-center">
        <div class="container">
            <h1 class="text-primary p-2">ElvireDev Sites Web</h1>
            <p>Voici les sites web que j'ai réalisé depuis deux ans et demi. Il s'agit de sites personnels, les modèles peuvent être utilisés pour créer de nouveaux sites. <br>Conception frontend et Backend. Les langages de programmation sont Html, Css/Sass, JavaScript, PHP. Méthodologie MVC pour le backend. <br>Les frameworks utilisés pour certaines applications sont Laravel, Symfony.</p>

            <ul class="nav nav-pills justify-content-center p-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('site.index') }}">
                        Total : {{ $sitesCount }} sites
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="container">
        <h2>Les derniers sites réalisés</h2>

        <div class="row mt-5">
            @foreach($sites as $site)
                <div class="col-md-4">
                    @include('site.card')
                </div>
            @endforeach
        </div>
    </div>

@endsection
