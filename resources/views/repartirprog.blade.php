@extends('servicefinancier')
@section('servfin')
 <h1>Répartition des montants</h1>
 <div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Indemnités</h5>
                    <p class="card-text">Montant : {{ $resultat['indemnites'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Université</h5>
                    <p class="card-text">Montant : {{ $resultat['universite'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Département</h5>
                    <p class="card-text">Montant : {{ $resultat['departement'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Faculté</h5>
                    <p class="card-text">Montant : {{ $resultat['faculte'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Gestion de la faculté</h5>
                    <p class="card-text">Montant : {{ $resultat['gestion_faculte'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">CFC</h5>
                    <p class="card-text">Montant : {{ $resultat['cfc'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Fonctionnaire</h5>
                    <p class="card-text">Montant : {{ $resultat['fonctionnaire'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Gestion de filiere</h5>
                    <p class="card-text">Montant : {{ $resultat['gestion_filiere'] }} MAD</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Matériel</h5>
                    <p class="card-text">Montant : {{ $resultat['materiel'] }} MAD</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection