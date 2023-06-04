@extends('etudiantpage')
@section('studentcontent')
  <div class="container m-3">
    <form class="p-3 border rounded-3" method="POST" action="{{ route('updatestore',['id' => $etudiant->id]) }}">
    @csrf
      <span class="brand-text font-weight-light">
                    <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img profile-img" alt="Student Profile">
        </span>
      <h3 class="mb-2">Modifier vos informations</h3>
      <div class="mb-1">
        <label  class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom_e }}">
      </div>
      <div class="mb-1">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom_e}}">
      </div>
      <div class="mb-1">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="{{ $etudiant->adresse }}">
      </div>
      <div class="mb-1">
        <label  class="form-label">Numéro de téléphone</label>
        <input type="tel" class="form-control" name="telephone" value="{{ $etudiant->telephone}}">
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
  </div>
@endsection