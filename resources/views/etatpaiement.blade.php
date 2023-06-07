@extends('servicefinancier')
@section('servfin')
 @if (session()->has('success'))
    <div class="container">
        <div class="row alert alert-success my-3">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="container">
        <div class="row alert alert-danger my-3">
            {{ session('error') }}
        </div>
    </div>
@endif

<div class="row">
    <div class="col-12">
        <table class="table table-striped table-bordered table-sm mt-4">
            <thead class="table-dark">
                <tr>
                   
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Photo</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Reçu</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                    @if ($etudiant->paiements->isEmpty())
                        <tr>
                          
                            <td>{{ $etudiant->nom_e }}</td>
                            <td>{{ $etudiant->prenom_e }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img rounded-circle">
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <i class="fas fa-times-circle text-danger"></i>
                            </td>
                        </tr>
                    @else
                        @php
                            $totalMontantPaye = 0;
                        @endphp
                        @foreach ($etudiant->paiements as $index => $paiement)
                            @php
                                $totalMontantPaye += $paiement->montant;
                            @endphp
                            <tr>
                                @if ($index === 0)
                                    <td rowspan="{{ count($etudiant->paiements) }}">
                                        {{ $etudiant->nom_e }}
                                    </td>
                                    <td rowspan="{{ count($etudiant->paiements) }}">
                                        {{ $etudiant->prenom_e }}
                                    </td>
                                    <td rowspan="{{ count($etudiant->paiements) }}">
                                        <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img rounded-circle">
                                    </td>
                                @endif
                                <td>{{ $paiement->date_vir }}</td>
                                <td>{{ $paiement->montant }} MAD</td>
                                <td>
                                    @if ($paiement->urlrecu)
                                        <a href="{{ asset('storage/'.$paiement->urlrecu) }}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($paiement->montant_valide === 1)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <form action="{{ route('valider_paiement', $paiement->num_vir) }}" method="POST">
                                            @csrf 
                                            <button type="submit" name="paiement_valide" class="btn btn-success">Valider</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td>Total Montant Payé:</td>
                            <td colspan="2">
                                @if ($totalMontantPaye == 25150)
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection