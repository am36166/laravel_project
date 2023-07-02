@extends('responsablemohamed')
@section('respfil')
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

<main class="table">
         <section class="table__header">
             <h1>Liste Des Etudiants</h1>
             <div class="input-group">
                 <input type="search" placeholder="Search Data...">
             </div>
         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                         <th> etudiant <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Montant <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Reçu <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Statut <span class="icon-arrow">&UpArrow;</span></th>
                     </tr>
                 </thead>
                 <tbody>
                 @foreach ($etudiants as $etudiant)
                    @if ($etudiant->paiements->isEmpty())
                     <tr>
                         <td> <img src="{{ asset('storage/'.$etudiant->urlimg) }}" alt="">{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</td>
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
                                    <td rowspan="{{ count($etudiant->paiements) }} {{ count($etudiant->paiements) }}">
                                       <img src="{{ asset('storage/'.$etudiant->urlimg) }}"> {{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}
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
                                                <span class="badge bg-warning text-dark">En attente de validation</span>
                                         @endif
                                </td>
                            </tr>
                            @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td>Total Montant Payé:</td>
                            <td colspan="1">
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
         </section>
     </main>
<style>
  * {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    font-family: sans-serif;
}

body {
    min-height: 100vh;
    background:url('{{ asset('RRR.png') }}');
    display: flex;
    justify-content: center;
    align-items: center;
}

main.table {
    width: 65vw;
    height: 90vh;
    background-color: #fff5;

    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}

.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}

table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}
</style>
@endsection