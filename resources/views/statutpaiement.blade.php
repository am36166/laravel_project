@extends('responsablefil')
@section('respfil')
<div class="container ">
    <h1 >Etat de paiements </h1>
    <div class="row">
      <div class="col-8">
        <table class="table table-striped table-bordered  table-sm mx-auto">
            <thead class="table-dark">
                <tr>
                    <th >CNE</th>
                    <th >Nom</th>
                    <th >Prénom</th>
                    <th >Étudiant</th>
                    <th >Statut</th>
                    <th >Montant total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->cne }}</td>
                    <td>{{ $etudiant->nom_e }}</td>
                    <td>{{ $etudiant->prenom_e }}</td>
                    <td><img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img rounded-circle"></td>
                    <td>
                        @if ($etudiant->nombre_virements > 0)
                            <span class="badge badge-success">Paid</span>
                        @else
                            <span class="badge badge-danger">Unpaid</span>
                        @endif
                    </td>
                    <td>{{ $etudiant->somme_montants }} MAD</td>
                </tr>
                @endforeach
            </tbody>
        </table>
     </div>
   </div>
</div>

@endsection