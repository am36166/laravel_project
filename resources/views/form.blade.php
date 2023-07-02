@extends('mainpage')
@section('content')
  @if (session()->has('reussie'))
           <div class="container">
            <div class="row alert alert-success my-3">
                 {{ session('reussie') }}
            </div>
      @endif
<<<<<<< HEAD
    <video autoplay loop muted playsinline id="background-video">
    <source src="{{ asset('pexels-eberhard-grossgasteiger-857251-1620x1080-25fps.mp4') }}" type="video/mp4">
    <!-- Ajoutez d'autres sources vidéo ici pour la compatibilité avec différents navigateurs -->
</video>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Inscription</div>
=======
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Inscription</div>
>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db

                <div class="card-body p-4">
                    <div class="form-group my-4">
                        <label for="user-type">Type d'utilisateur :</label>
                        <select id="user-type" class="form-control">
                            <option value="etudiant">Etudiant</option>
                            <option value="responsable">Responsable</option>
                        </select>
                    </div>

                    <div id="etudiant-form" style="display: none;">
                        <form method="POST" action="{{ route('storeetud') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group my-2">
                                <label for="cin">CIN :</label>
                                <input type="text" name="cne" id="cin" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="datenaissance">Date de Naissance :</label>
                                <input type="date" name="datenaissance" class="form-control" required>
                            </div>

<<<<<<< HEAD
                                <div class="form-group my-2">
                                    <label for="filiere">Filière :</label>
                                    <select name="filiere" class="form-control" id="fil">
                    <option selected disabled class="selected">Choisir la filiére</option>
                    <optgroup label="licence prefessionnelle:">
                        <optgroup label="Informatique:">
                            <option value="aasri">AASRI</option>
                            <option value="asbdr">ASBDR</option>
                            <option value="daabd">DAABD</option>
                            <option value="di">DI</option>
                            <option value="dwm">DWM</option>
                            <option value="im">IM</option>
                            <option value="lsi">LSI</option>
                            <option value="ircc">IRCC</option>
                            <option value="taw">TAW</option>
                            <option value="fs-devops">FS and DEVOP</option>
                            <option value="mispp">MISPP</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="lpeeaii">LPEEAII</option>
                            <option value="gc">GC</option>
                            <option value="gese">GESE</option>
                            <option value="gil">GIL</option>
                            <option value="ga">GA</option>
                            <option value="gamur">GAMUR</option>
                            <option value="tmbtp">TMBTP</option>
                        </optgroup>
                    <optgroup label="Masters spécialisés">
                        <optgroup label="Informatique:">
                            <option value="bd2c">BD2C</option>
                            <option value="bisd">BISD</option>
                            <option value="msi">MSI</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="meeaii">MEEAII</option>
                            <option value="gl">GL</option>
                            <option value="ier">IER</option>
                            <option value="msm">MSM</option>
                            <option value="bimae">BIMAE</option>
                        </optgroup>
                    </optgroup>
                </select>
                                </div>
=======
                            <div class="form-group my-2">
                                <label for="filiere">Filière :</label>
                                <select name="filiere" class="form-control" required>
                                    <option selected disabled>Choisir la filière</option>
                                    <optgroup label="Licence professionnelle:">
                                        <optgroup label="Informatique:">
                                            <option value="aasri">AASRI</option>
                                            <option value="asbdr">ASBDR</option>
                                            <option value="daabd">DAABD</option>
                                            <option value="di">DI</option>
                                            <option value="dwm">DWM</option>
                                            <option value="im">IM</option>
                                            <option value="lsi">LSI</option>
                                            <option value="ircc">IRCC</option>
                                            <option value="taw">TAW</option>
                                            <option value="fs-devops">FS and DEVOP</option>
                                            <option value="mispp">MISPP</option>
                                        </optgroup>
                                        <optgroup label="Sciences de l'ingénieur">
                                            <option value="lpeeaii">LPEEAII</option>
                                            <option value="gc">GC</option>
                                            <option value="gese">GESE</option>
                                            <option value="gil">GIL</option>
                                            <option value="ga">GA</option>
                                            <option value="gamur">GAMUR</option>
                                            <option value="tmbtp">TMBTP</option>
                                        </optgroup>
                                    </optgroup>
                                    <optgroup label="Masters spécialisés">
                                        <optgroup label="Informatique:">
                                            <option value="bd2c">BD2C</option>
                                            <option value="bisd">BISD</option>
                                            <option value="msi">MSI</option>
                                        </optgroup>
                                        <optgroup label="Sciences de l'ingénieur">
                                            <option value="meeaii">MEEAII</option>
                                            <option value="gl">GL</option>
                                            <option value="ier">IER</option>
                                            <option value="msm">MSM</option>
                                            <option value="bimae">BIMAE</option>
                                        </optgroup>
                                    </optgroup>
                                </select>
                            </div>
>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db

                            <div class="form-group my-2">
                                <label for="adresse">Adresse :</label>
                                <textarea name="adresse" id="adresse" class="form-control" rows="1" required></textarea>
                            </div>

                            <div class="form-group my-2">
                                <label for="photo">Photo :</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>

                            <div class="form-group my-2">
                                <label for="telephone">Numéro de téléphone :</label>
                                <input type="text" name="telephone" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="login">Nom d'utilisateur :</label>
                                <input type="text" name="login" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="password">Mot de passe :</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-4">Inscription</button>
                        </form>
                    </div>

                    <div id="responsable-form" style="display: none;">
                        <form method="POST" action="{{ route('storeresp') }}">
                            @csrf

                            <div class="form-group my-2">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

<<<<<<< HEAD
                                <div class="form-group my-2">
                                    <label for="filiere">Filière :</label>
                                    <select name="filiere" class="form-control" id="fil">
                    <option selected disabled class="selected">Choisir la filiére</option>
                    <optgroup label="licence prefessionnelle:">
                        <optgroup label="Informatique:">
                            <option value="aasri">AASRI</option>
                            <option value="asbdr">ASBDR</option>
                            <option value="daabd">DAABD</option>
                            <option value="di">DI</option>
                            <option value="dwm">DWM</option>
                            <option value="im">IM</option>
                            <option value="lsi">LSI</option>
                            <option value="ircc">IRCC</option>
                            <option value="taw">TAW</option>
                            <option value="fs-devops">FS and DEVOP</option>
                            <option value="mispp">MISPP</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="lpeeaii">LPEEAII</option>
                            <option value="gc">GC</option>
                            <option value="gese">GESE</option>
                            <option value="gil">GIL</option>
                            <option value="ga">GA</option>
                            <option value="gamur">GAMUR</option>
                            <option value="tmbtp">TMBTP</option>
                        </optgroup>
                    <optgroup label="Masters spécialisés">
                        <optgroup label="Informatique:">
                            <option value="bd2c">BD2C</option>
                            <option value="bisd">BISD</option>
                            <option value="msi">MSI</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="meeaii">MEEAII</option>
                            <option value="gl">GL</option>
                            <option value="ier">IER</option>
                            <option value="msm">MSM</option>
                            <option value="bimae">BIMAE</option>
                        </optgroup>
                    </optgroup>
                </select>
=======
                            <div class="form-group my-2">
                                <label for="filiere">Filière :</label>
                                <select name="filiere" class="form-control" required>
                                    <option selected disabled>Choisir la filière</option>
                                    <optgroup label="Licence professionnelle:">
                                        <optgroup label="Informatique:">
                                            <option value="aasri">AASRI</option>
                                            <option value="asbdr">ASBDR</option>
                                            <option value="daabd">DAABD</option>
                                            <option value="di">DI</option>
                                            <option value="dwm">DWM</option>
                                            <option value="im">IM</option>
                                            <option value="lsi">LSI</option>
                                            <option value="ircc">IRCC</option>
                                            <option value="taw">TAW</option>
                                            <option value="fs-devops">FS and DEVOP</option>
                                            <option value="mispp">MISPP</option>
                                        </optgroup>
                                        <optgroup label="Sciences de l'ingénieur">
                                            <option value="lpeeaii">LPEEAII</option>
                                            <option value="gc">GC</option>
                                            <option value="gese">GESE</option>
                                            <option value="gil">GIL</option>
                                            <option value="ga">GA</option>
                                            <option value="gamur">GAMUR</option>
                                            <option value="tmbtp">TMBTP</option>
                                        </optgroup>
                                        <optgroup label="Masters spécialisés">
                                            <optgroup label="Informatique:">
                                                <option value="bd2c">BD2C</option>
                                                <option value="bisd">BISD</option>
                                                <option value="msi">MSI</option>
                                            </optgroup>
                                            <optgroup label="Sciences de l'ingénieur">
                                                <option value="meeaii">MEEAII</option>
                                                <option value="gl">GL</option>
                                                <option value="ier">IER</option>
                                                <option value="msm">MSM</option>
                                                <option value="bimae">BIMAE</option>
                                            </optgroup>
                                        </optgroup>
                                    </select>
>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db
                                </div>

                                <div class="form-group my-2">
                                    <label for="username">Nom d'utilisateur :</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>

                                <div class="form-group my-2">
                                    <label for="password">Mot de passe :</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group my-2">
                                    <label for="password_confirmation">Confirmation du mot de passe :</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary my-4">Inscription</button>
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
<<<<<<< HEAD
<style>
    #background-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }
</style>
=======


>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db
@endsection

