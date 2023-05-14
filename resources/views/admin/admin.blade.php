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
    </style>
</head>
<body>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://unpkg.com/htmx.org@1.8.6"></script>

<script>
    //new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
</script>
</body>
</html>
