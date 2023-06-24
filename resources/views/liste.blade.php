@extends('serviceinfo')
@section('liste')
      
             @if (session()->has('update'))
                 <div class="container">
                      <div class="row alert alert-success my-2">
                           {{ session('update') }}
                    </div>
                @endif
                  @if (session()->has('success'))
                 <div class="container">
                      <div class="row alert alert-success my-2">
                           {{ session('success') }}
                    </div>
                @endif
                   @if (session()->has('ajout'))
                 <div class="container">
                      <div class="row alert alert-success my-2">
                           {{ session('ajout') }}
                    </div>
                @endif
   
<section class="content">
  
        <div class="row">
                <div class="col-10">
                     <div class="mb-3">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAjoutEtudiant"><i class="fas fa-plus"></i> Ajouter un étudiant</button>
                    </div>
               </div>
        </div>


       <div class="row">
          <div class="col-10">
            <table class="table table-striped table-bordered table-sm mx-auto">
                <thead class="table-dark">
                    <tr>
                        <th>Photo</th>
                        <th>CNE</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudiants as $etudiant)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img-fluid rounded-circle" alt="Profil de l'étudiant" width="50">
                            </td>
                            <td>{{ $etudiant->cne }}</td>
                            <td>{{ $etudiant->nom_e }}</td>
                            <td>{{ $etudiant->prenom_e }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#form2"
                                    data-id="{{ $etudiant->id }}" data-nom="{{ $etudiant->nom_e }}"
                                    data-prenom="{{ $etudiant->prenom_e }}" data-adresse="{{ $etudiant->adresse }}"
                                    data-telephone="{{ $etudiant->telephone }}"> <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="confirmerSuppression({{ $etudiant->id }})">  <i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
  </div>


</section>
 <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header border-bottom-0">
                                          <h5 class="modal-title" id="exampleModalLabel">Modifier les informations</h5>
                                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                           </button>
                                       
                                     </div>

            <form method="POST" action="{{ route('storemodif') }}">
                    <div class="modal-body">
                    @csrf
                <input type="hidden" name="id" id="etudiant-id">
                <div class="mb-1">
                        <label  class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
                </div>
                <div class="mb-1">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}">
                </div>
               <div class="mb-1">
                    <label class="form-label">Adresse</label>
                     <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse') }}">
                 </div>
                <div class="mb-1">
                        <label  class="form-label">Numéro de téléphone</label>
                         <input type="tel" class="form-control" name="telephone" id="telephone" value="{{ old('telephone') }}">
                </div>
      
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">Enregister les modifications</button>
                 </div>
        </div>                 
</form>
                                    
    </div>
    </div>
     </div>

<div class="modal fade" id="modalAjoutEtudiant" tabindex="-1" role="dialog" aria-labelledby="modalAjoutEtudiantLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAjoutEtudiantLabel">Ajouter un étudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAjoutEtudiant" method="POST" action="{{ route('ajoutetudiant') }}" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
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
                         <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          </div>
                 </div>
         </form>
        </div>
    </div>
 </div>   

     <script>
    var exampleModal = document.getElementById('form2');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var nom = button.getAttribute('data-nom');
        var prenom = button.getAttribute('data-prenom');
        var adresse = button.getAttribute('data-adresse');
        var telephone = button.getAttribute('data-telephone');
         var id = button.getAttribute('data-id');

        var modal = document.getElementById('form2');
        modal.querySelector('#nom').value = nom;
        modal.querySelector('#prenom').value = prenom;
        modal.querySelector('#adresse').value = adresse;
        modal.querySelector('#telephone').value = telephone;
        modal.querySelector('#etudiant-id').value = id;

    });
</script>
<script>
    function confirmerSuppression(etudiantId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            window.location.href = "/serviceinf/supprimer-etudiant/" + etudiantId;
        }
    }
</script>
                             
   
@endsection
     
