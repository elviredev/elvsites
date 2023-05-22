<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootswatch CDN --}}
    <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
    {{-- Fontawesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- tom-select JS--}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <title>@yield('title') | Administration</title>
    <style>
        @layer reset {
            button {
                all: unset;
            }
        }
        .htmx-indicator {
            display:none;
        }
        .htmx-request .htmx-indicator {
            display:inline-block;
        }
        .htmx-request.htmx-indicator {
            display:inline-block;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ElvSites</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $route = request()->route()->getName();
        @endphp

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($route, 'site.')]) href="{{ route('admin.site.index') }}" aria-current="page">Sites Web</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($route, 'category.')]) href="{{ route('admin.category.index') }}" aria-current="page">Catégories</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($route, 'technology.')]) href="{{ route('admin.technology.index') }}" aria-current="page">Technologies</a>
                </li>
            </ul>

            <div class="ms-auto">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="nav-link">Se Déconnecter</button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>

    </div>
</nav>

<div class="container mt-5">
    @include('shared.flash')
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://unpkg.com/htmx.org@1.9.2"></script>

<script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
</script>
</body>
</html>
