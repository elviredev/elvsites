<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    {{-- Bootswatch CDN --}}
    <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
    {{-- Fontawesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title') | ElvSites</title>

    <style>
        a {
            text-decoration: none;
            color: #b6d4fe;
        }
        a:hover {
            color: #0d6efd ;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a @class(['nav-link', 'active' => str_contains($route, 'site.')]) href="{{ route('site.index') }}" aria-current="page">Sites Web</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
@yield('content')

<div class="d-flex flex-column flex-md-row p-4 mt-4 align-items-center justify-content-center border-top border-primary text-center">
    <div class=" mb-3">
        <img class="w-50" src="{{asset('logo-gray.png')}}" alt="logo ews">
    </div>
    <div class="fs-5">
        &copy; elvirewebsite.fr | 2023
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/htmx.org@1.8.6"></script>

</body>
</html>
