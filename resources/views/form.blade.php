@extends('mainpage')
@section('content')
  @if (session()->has('reussie'))
           <div class="container">
            <div class="row alert alert-success my-3">
                 {{ session('reussie') }}
            </div>
      @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="user-type">Type d'utilisateur</label>
                        <select id="user-type" class="form-control">
                            <option value="etudiant">Étudiant</option>
                            <option value="responsable">Responsable</option>
                        </select>
                    </div>

                    <div id="etudiant-form" style="display: none;">
                        <form method="POST" action="{{ route('storeetud') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="cin">CIN :</label>
                                <input type="text" name="cne" id="cin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="datenaissance">Date de Naissance :</label>
                                <input type="date" name="datenaissance" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="filiere">Filière :</label>
                                <select name="filiere" class="form-control" required>
                                    <option value="smi">SMI</option>
                                    <option value="smpc">SMPC</option>
                                    <option value="biologie">Biologie</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse :</label>
                                <textarea name="adresse" id="adresse" class="form-control" rows="1" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo :</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Numéro de téléphone :</label>
                                <input type="text" name="telephone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="login">Nom d'utilisateur :</label>
                                <input type="text" name="login" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Inscription Étudiant</button>
                        </form>
                    </div>

                    <div id="responsable-form" style="display: none;">
                        <form method="POST" action="{{ route('storeresp') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

                            
                            <div class="form-group">
                                <label for="filiere">Filière :</label>
                                <select name="filiere" class="form-control" required>
                                    <option value="smi">SMI</option>
                                    <option value="smpc">SMPC</option>
                                    <option value="biologie">Biologie</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="username">Nom d'utilisateur :</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmation du mot de passe :</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Inscription Responsable</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('user-type').addEventListener('change', function () {
        var etudiantForm = document.getElementById('etudiant-form');
        var responsableForm = document.getElementById('responsable-form');

        if (this.value === 'etudiant') {
            etudiantForm.style.display = 'block';
            responsableForm.style.display = 'none';
        } else if (this.value === 'responsable') {
            etudiantForm.style.display = 'none';
            responsableForm.style.display = 'block';
        } else {
            etudiantForm.style.display = 'none';
            responsableForm.style.display = 'none';
        }
    });
</script>

@endsection

