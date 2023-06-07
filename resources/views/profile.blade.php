@extends('etudiantpage')
@section('title','Espace etudiant')
@section('studentcontent')
<div class="card">
    <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="card-img-top img rounded-circle" alt="Student Profile">
    <div class="card-body">
        <p class="card-text">Bienvenue {{ $etudiant->prenom_e }} sur votre espace étudiant. Ici, vous pouvez faire un tas de choses. Nous vous laissons explorer.</p>
    </div>
</div>


@endsection