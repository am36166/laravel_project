<form>
        <div class="modal-body">
                    @csrf
                <div class="mb-1">
                        <label  class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom_e }}">
                </div>
                <div class="mb-1">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom_e }}">
                </div>
               <div class="mb-1">
                    <label class="form-label">Adresse</label>
                     <input type="text" class="form-control" name="adresse" value="{{ $etudiant->adresse }}">
                 </div>
                <div class="mb-1">
                        <label  class="form-label">Numéro de téléphone</label>
                         <input type="tel" class="form-control" name="telephone" value="{{ $etudiant->telephone }}">
                </div>
      
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">Enregister les modifications</button>
                 </div>
        </div>                 
</form>