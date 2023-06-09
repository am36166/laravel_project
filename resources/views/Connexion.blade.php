@extends('mainpage')
@section('content')
 @if (session()->has('success'))
            <div class="container">
              <div class="row alert alert-danger my-3">
                {{ session('success') }}
              </div>
            </div>
  @endif
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center mb-4">S'authentifier</h4>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            @if (session()->has('Erreurs'))
            <div class="container">
              <div class="row alert alert-danger my-3">
                {{ session('Erreurs') }}
              </div>
            </div>
            @endif
            <div class="mb-3">
              <label for="username" class="form-label">Nom d'utilisateur</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
            <div class="text-center mt-3">
              <a href="{{ route('oublimotdepasse') }}">Mot de passe oublié ?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
