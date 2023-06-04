@extends('mainpage')
@section('content')
<div class="container mb-1">
    <div class="row justify-content-center mt-2">
        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">Inscrivez Vous</div>

                <div class="card-body">
                <form method="POST" action="{{ route('storeetud') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-1">
                            <label for="cin">CIN :</label>
                            <input type="text" name="cne" id="cin" class="form-control" required>
                        </div>

                        <div class="form-group mb-1">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                         <div class="form-group mb-1">
                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom"  class="form-control" required>
                        </div>


                        <div class="form-group mb-1">
                            <label for="prenom">Date de Naissance :</label>
                            <input type="date" name="datenaissance"  class="form-control" required>
                        </div>

                        <div class="form-group mb-1">
                            <label for="adresse">Adresse :</label>
                            <textarea name="adresse" id="adresse" class="form-control" rows="1" required></textarea>
                        </div>

                        <div class="form-group mb-1">
                            <label for="photo">Photo :</label>
                            <input type="file" name="image"   class="form-control-file" >
                        </div>

                         <div class="form-group mb-1">
                            <label for="tel">Numero de telephone :</label>
                            <input type="text" name="telephone"  class="form-control" required>
                        </div>

                         <div class="form-group mb-1">
                            <label for="tel">Nom d'utilisateur :</label>
                            <input type="text" name="login"  class="form-control" required>
                        </div> 

                         <div class="form-group mb-1">
                            <label for="tel">Mot de passe:</label>
                            <input type="password" name="password"  class="form-control" required>
                        </div>

                        <div class="form-group text-center mt-1">
                            <button type="submit" class="btn btn-primary">Inscription</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

