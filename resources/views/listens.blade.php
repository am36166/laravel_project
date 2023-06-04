@extends('responsablefil')
@section('respfil')
  <div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
            <tr>
                <td>{{ $enseignant->nom_en }}</td>
                <td>{{ $enseignant->prenom_en }}</td>
                <td>{{ $enseignant->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
  @endsection