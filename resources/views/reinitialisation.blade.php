@extends('mainpage')
@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center mb-4">Réinitialiser le mot de passe</h4>
          <form method="POST" action="">
            @csrf
            @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                           @endforeach
                    </ul>
                   </div>
                        @endif
            <div class="mb-3">
              <label for="username" class="form-label">Nom d'utilisateur</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label for="cne" class="form-label">CNE</label>
              <input type="text" class="form-control" name="cne" required>
            </div>
            <div class="mb-3">
              <label for="new_password" class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control" name="new_password" required>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection