@extends('etudiantpage')
@section('studentcontent')

 <div class="container">
        <h1>Historique des paiements</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Montant</th>
                    <th>Date de paiement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($infosvirements as $virement)
                    <tr>
                        <td>{{ $virement->montant }}</td>
                        <td>{{ $virement->date_vir }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection