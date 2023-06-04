<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body> 
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark" >
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">Acceuil</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <li class="nav-item">
          <a class="nav-link" href="">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('form') }}">Inscription</a>
        </li>
      </ul>
    </div>
    <div class="ml-auto">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
       @if (session()->has('success'))
           <div class="container">
            <div class="row alert alert-success my-3">
                 {{ session('success') }}
            </div>
      @endif
   
        @yield('content')
</body>
</html>