@extends('etudiantpage')
@section('studentcontent')
<div class="card">
                <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="card-img-top img rounded-circle" alt="Student Profile">
                <div class="card-body">
                   <p class="card-title">{{$etudiant->prenom_e  }} </p>
                   <p class="card-text">Bienvenue Sur Votre Espace Etudiant
                       Ici Vous pouvez Faire un Tas de Chose , On vous laisse Explorer.
                    </p>
                </div>
</div>

@endsection