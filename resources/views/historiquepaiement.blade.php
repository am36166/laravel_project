
@section('title','Historique paiement')
@section('studentcontent')
<style>
    .side-nav{
    width: 110px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    padding: 30px 15px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    transition: width 0.5s;
}
.user{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 60px;
    font-size: 12px;
    padding: 10px;
    border-radius: 8px;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
}
.user div{
    display: none;
}
.user h2{
    font-size: 15px;
    font-weight: 600;
    white-space: nowrap;
}
.user-img{
    width: 50px;
    border-radius: 50%;
    margin: auto;
}
ul{
    list-style: none;
    padding: 0 15px;
}
ul li{
    margin: 30px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
ul li i{
    width: 30px;
    margin-right: 0px;
}
ul li a{
    white-space: nowrap;
    display: none;
}
.side-nav:hover{
    width: 250px;
}
.side-nav:hover .user div{
    display: block;
}
.side-nav:hover .user{
    width: 100%;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
}
.side-nav:hover .user-img{
    margin: 0;
}
.side-nav:hover ul li a{
    display: block;
    text-decoration: none;
}
.side-nav:hover ul li i{
    margin-right: 10px;
}
.side-nav:hover ul li {
    justify-content: flex-start;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    

    <div class="side-nav">
        <div class="user">
            <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="user-img">
        <div>
            <h2>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</h2>
            <p>{{ $etudiant->cne }}</p>
        </div>  
        </div>
        <ul>
            <li><i class="uil uil-estate"></i><a href="{{ route('page', ['id' => $etudiant->id]) }}">HOME</a></li>
            <li><i class="uil uil-user"></i><a href="{{ route('profile', ['id' => $etudiant->id]) }}">PROFILE</a></li>
            <li><i class="uil uil-bill"></i><a href="{{ route('paiement', ['id' => $etudiant->id]) }}">PAIEMENT</a></li>
            <li><i class="uil uil-history"></i><a href="{{ route('historique', ['id' => $etudiant->id]) }}">HISTORIQUE</a></li>
            <li><i class="uil uil-setting"></i><a href="{{ route('updatedata', ['id' => $etudiant->id]) }}">PARAMETRE</a></li>
        </ul>

        <ul>
            <li><i class="uil uil-signout"></i><a href="{{ route('logout') }}">Deconection</a></li>
        </ul>
    </div>
</div>


    <main class="table">
        <section class="table__header">
            <h1>Historique des paiements</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Montant <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date de Paiemant <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($infosvirements as $virement)
                    <tr>
                        <td> {{ $virement->montant }} </td>
                        <td> {{ $virement->date_vir }} </td>
                    </tr>
                  @endforeach  
                </tbody>
            </table>
        </section>
    </main>
    </body>
</html>
<style>
    * {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    font-family: sans-serif;
}

body {
    min-height: 100vh;
    background: url('{{ asset('R.png') }}') center / cover;
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
