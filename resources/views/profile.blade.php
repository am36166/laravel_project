@extends('etudiantpage')
@section('title','Profile')
@section('style')
<style>
  .profile-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh; 
}
  
  .profile-picture {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
  }
  
  .profile-picture img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
  
  .profile-name {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
  }
  
  .profile-card {
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
  }
  
  .profile-details h6 {
      font-weight: bold;
      margin-bottom: 5px;
  }
  
  .profile-details p {
      margin: 0;
      color: #555;
      text-align: center;
  }
</style>
@endsection
@section('studentcontent')
 <div class="profile-container">
      <div class="profile-card">
          <div class="profile-picture">
              <img src="{{ asset('storage/'.$etudiant->urlimg) }}" alt="Profile Picture">
          </div>
          <div class="profile-details">
              <h6>Nom et Prenom :</h6>
              <p>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</p>
              <h6>Telephone :</h6>
              <p>{{ $etudiant->telephone }}</p>
              <h6>Date de naissance</h6>
              <p>{{ $etudiant->date_naissance }}</p>
              <h6>Addresse</h6>
              <p>{{ $etudiant->adresse }}</p>
          </div>
      </div>
  </div>
@endsection