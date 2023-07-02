@section('title','Service Informatique')
@section('studentcontent')
@section('liste')
      
     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Des Etudiant</title>
    <!-- <link rel="stylesheet" type="text/css" href="Profil_etu.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
    <div class="side-nav">
        
        <ul>
            <li><i class="uil uil-estate"></i><a href="{{ route('serviceinf') }}">HOME</a></li>
            <li><i class="uil uil-invoice"></i><a href="{{ route('listes') }}">Liste des étudiants</a></li>
        </ul>

        <ul>
            <li><i class="uil uil-signout"></i><a href="{{ route('logout') }}">Deconection</a></li>
        </ul>
    </div>
</div>

    
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

<section class="content">
  
        <div class="row">
                <div class="col-10">
                @if (session()->has('update'))
          <div class="container">
               <div class="row alert alert-success my-2">
                    {{ session('update') }}
             </div>
         @endif
           @if (session()->has('success'))
          <div class="container">
               <div class="row alert alert-success my-2">
                    {{ session('success') }}
             </div>
         @endif
            @if (session()->has('ajout'))
          <div class="container">
               <div class="row alert alert-success my-2">
                    {{ session('ajout') }}
             </div>
         @endif
               </div>
        </div>


       
  </div>

  <main class="table">
         <section class="table__header">
             <h1>Liste des etudiants</h1>
                 <div class="mb-3">
                          <button class="btn btn-primary mt-4"  data-bs-toggle="modal" data-bs-target="#modalAjoutEtudiant"><i class="fas fa-plus"></i> Ajouter un étudiant</button>
                    </div>
             
         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                         <th> Etudiant <span class="icon-arrow">&UpArrow;</span></th>
                         <th> cne <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Adresse <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Telephone <span class="icon-arrow">&UpArrow;</span></th>
                         <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                     </tr>
                 </thead>
                 <tbody>
                 @foreach ($etudiants as $etudiant)
                     <tr>
                         <td> <img src="{{ asset('storage/'.$etudiant->urlimg) }}"> {{ $etudiant->nom_e }}  {{ $etudiant->prenom_e }}</td>
                         <td> {{ $etudiant->cne }} </td>
                         <td> {{ $etudiant->adresse }} </td>
                         <td>{{ $etudiant->telephone }}</td>
                         <td>
                         <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#form2"
                                    data-id="{{ $etudiant->id }}" data-nom="{{ $etudiant->nom_e }}"
                                    data-prenom="{{ $etudiant->prenom_e }}" data-adresse="{{ $etudiant->adresse }}"
                                    data-telephone="{{ $etudiant->telephone }}"> <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="confirmerSuppression({{ $etudiant->id }})">  <i class="fas fa-trash-alt"></i></button>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </section>
     </main>


</section>
 <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header border-bottom-0">
                                          <h5 class="modal-title" id="exampleModalLabel">Modifier les informations</h5>
                                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                           </button>
                                       
                                     </div>

            <form method="POST" action="{{ route('storemodif') }}">
                    <div class="modal-body">
                    @csrf
                <input type="hidden" name="id" id="etudiant-id">
                <div class="mb-1">
                        <label  class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
                </div>
                <div class="mb-1">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}">
                </div>
               <div class="mb-1">
                    <label class="form-label">Adresse</label>
                     <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse') }}">
                 </div>
                <div class="mb-1">
                        <label  class="form-label">Numéro de téléphone</label>
                         <input type="tel" class="form-control" name="telephone" id="telephone" value="{{ old('telephone') }}">
                </div>
      
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">Enregister les modifications</button>
                 </div>
        </div>                 
</form>
                                    
    </div>
    </div>
     </div>

<div class="modal fade" id="modalAjoutEtudiant" tabindex="-1" role="dialog" aria-labelledby="modalAjoutEtudiantLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAjoutEtudiantLabel">Ajouter un étudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAjoutEtudiant" method="POST" action="{{ route('ajoutetudiant') }}" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                            <label for="cin">CIN :</label>
                            <input type="text" name="cne" id="cin" class="form-control" required>
                        </div>

                        <div class="form-group mb-1">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                         <div class="form-group mb-1">
                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom"  class="form-control" required>
                        </div>


                        <div class="form-group mb-1">
                            <label for="prenom">Date de Naissance :</label>
                            <input type="date" name="datenaissance"  class="form-control" required>
                        </div>

                        <div class="form-group mb-1">
                            <label for="adresse">Adresse :</label>
                            <textarea name="adresse" id="adresse" class="form-control" rows="1" required></textarea>
                        </div>

                        <div class="form-group mb-1">
                            <label for="photo">Photo :</label>
                            <input type="file" name="image"   class="form-control-file" >
                        </div>

                         <div class="form-group mb-1">
                            <label for="tel">Numero de telephone :</label>
                            <input type="text" name="telephone"  class="form-control" required>
                        </div>
                        <div>
                        <label for="filiere">La filiere :</label>
                        <select name="filiere" class="form-control" id="fil">
                    <option selected disabled class="selected">Choisir la filiére</option>
                    <optgroup label="licence prefessionnelle:">
                        <optgroup label="Informatique:">
                            <option value="aasri">AASRI</option>
                            <option value="asbdr">ASBDR</option>
                            <option value="daabd">DAABD</option>
                            <option value="di">DI</option>
                            <option value="dwm">DWM</option>
                            <option value="im">IM</option>
                            <option value="lsi">LSI</option>
                            <option value="ircc">IRCC</option>
                            <option value="taw">TAW</option>
                            <option value="fs-devops">FS and DEVOP</option>
                            <option value="mispp">MISPP</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="lpeeaii">LPEEAII</option>
                            <option value="gc">GC</option>
                            <option value="gese">GESE</option>
                            <option value="gil">GIL</option>
                            <option value="ga">GA</option>
                            <option value="gamur">GAMUR</option>
                            <option value="tmbtp">TMBTP</option>
                        </optgroup>
                    <optgroup label="Masters spécialisés">
                        <optgroup label="Informatique:">
                            <option value="bd2c">BD2C</option>
                            <option value="bisd">BISD</option>
                            <option value="msi">MSI</option>
                        </optgroup>
                        <optgroup label="Sciences de l'ingénieur">
                            <option value="meeaii">MEEAII</option>
                            <option value="gl">GL</option>
                            <option value="ier">IER</option>
                            <option value="msm">MSM</option>
                            <option value="bimae">BIMAE</option>
                        </optgroup>
                    </optgroup>
                </select>
                        </div>
                         <div class="form-group mb-1">
                            <label for="tel">Nom d'utilisateur :</label>
                            <input type="text" name="login"  class="form-control" required>
                        </div> 

                         <div class="form-group mb-1">
                            <label for="tel">Mot de passe:</label>
                            <input type="password" name="password"  class="form-control" required>
                        </div>
                         <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          </div>
                 </div>
         </form>
        </div>
    </div>
 </div>   

 <style>
     * {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    font-family: sans-serif;
}
.btn{
    color: #333;
}
body {
    min-height: 100vh;
    background:url('{{ asset('RRR.png') }}');
    display: flex;
    justify-content: center;
    align-items: center;
}

main.table {
    top: 200px;
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

     <script>
    var exampleModal = document.getElementById('form2');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var nom = button.getAttribute('data-nom');
        var prenom = button.getAttribute('data-prenom');
        var adresse = button.getAttribute('data-adresse');
        var telephone = button.getAttribute('data-telephone');
         var id = button.getAttribute('data-id');

        var modal = document.getElementById('form2');
        modal.querySelector('#nom').value = nom;
        modal.querySelector('#prenom').value = prenom;
        modal.querySelector('#adresse').value = adresse;
        modal.querySelector('#telephone').value = telephone;
        modal.querySelector('#etudiant-id').value = id;

    });
</script>
<script>
    function confirmerSuppression(etudiantId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            window.location.href = "/serviceinf/supprimer-etudiant/" + etudiantId;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
     
