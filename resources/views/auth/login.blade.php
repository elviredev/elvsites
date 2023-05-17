@extends('base')

@section('title', 'Se Connecter')

@section('content')

    <div class="container mt-4 d-flex flex-column align-items-center">
        <h1 class="text-uppercase py-3">@yield('title')</h1>

        <div class="w-50">
        @include('shared.flash')

        </div>

        <div class="card w-50">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST" class="vstack gap-3">
                    @csrf

                    @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email'])
                    @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de Passe'])
                    <div class="form-group">
                        <button class="btn btn-primary my-3">Se Connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
