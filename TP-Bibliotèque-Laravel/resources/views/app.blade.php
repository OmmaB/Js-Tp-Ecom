<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <h1 class="text-lg-center text-secondary fst-italic">Gestion de bibliothèque</h1><br><br>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auteurs.index')}}">Liste d'Auteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('livres.index')}}">Liste Livres</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-right" href="{{route('emprunts.index')}}">Liste Emprunts</a>
                    </li>
                </ul>
            </div>
      </nav>
    </div><br><br>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>