@extends('responsablemohamed')
@section('respfil')
  
<main class="table">
         <section class="table__header">
             <h1>Liste des Enseignants</h1>
             <div class="input-group">
                 <input type="search" placeholder="Search Data...">
             </div>
         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                         <th> Nom <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Prenom <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                     </tr>
                 </thead>
                 <tbody>
                 @foreach ($enseignants as $enseignant)
                     <tr>
                         <td> {{ $enseignant->nom_en }} </td>
                         <td> {{ $enseignant->prenom_en }} </td>
                         <td> {{ $enseignant->type }} </td>
                     </tr>
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
    background: url('{{ asset('RRR.png') }}') center / cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

main.table {
    width: 52vw;
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

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td{
    transition: .2s ease-in-out;
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


thead th.active,tbody td.active {
    color: #6c00bd;
}
</style>
  @endsection