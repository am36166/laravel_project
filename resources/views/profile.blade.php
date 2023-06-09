@extends('etudiantpage')
@section('title', 'Espace étudiant')
@section('style')
<style>
.profile-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    opacity: 0; /* Initial opacity set to 0 */
    transition: opacity 0.5s ease-out; /* Transition effect for opacity */
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
            <h6>Phone</h6>
            <p>{{ $etudiant->telephone }}</p>
            <h6>Date de naissance</h6>
            <p>{{ $etudiant->date_naissance }}</p>
            <h6>Addresse</h6>
            <p>{{ $etudiant->adresse }}</p>
        </div>
    </div>
</div>

@endsection
