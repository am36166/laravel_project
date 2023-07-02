@extends('responsablemohamed')
@section('respfil')
  <div class="container mt-5">
    @if (session()->has('succes'))
    <div class="alert alert-success my-3">
        {{ session('succes') }}
    </div>
    @endif
    <div class="row mb-3">
        <div class="col">
            <button class="btn btn-primary btn-sm me-2" id="btnAjouterEnseignant">
                <i class="bi bi-plus"></i> Ajouter Enseignant
            </button>
            <button class="btn btn-success btn-sm me-2" id="btnGestionVacation">
                <i class="bi bi-plus"></i> Gestion de vacation
            </button>
            <a href="{{ route('listens') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-list"></i> Liste Enseignants
            </a>
        </div>
    </div>

    <section>
        
        <div class="box">
            <div class="container">
             <div id="formulaireEnseignant" style="display: none;" class="form">
                <h2>Nouveau intervenant</h2>
                <form method="POST" action="{{ route('storeenseignant') }}">
                @csrf
                  <div class="inputBox">
                    <input type="text" name="nom" placeholder="nom" >
                  </div>
                  <div class="inputBox">
                    <input type="text" name="prenom" placeholder="prenom" >
                  </div>
                  <div class="select">
                       <select name="typeEnseignant" id="typeEnseignant">
                                      <option selected disabled class="selected">Type d'intervenant</option>
                                        <option value="interne">Interne</option>
                                        <option value="externe">Externe</option>
                       </select>
                   </div>
                   <div class="inputBox" id="faculteField" style="display: none;">
                    <input type="text" name="faculte" placeholder="Université" >
                  </div>
               <button type="submit" class="btn">Ajouter</button>  
                </form>
             </div> 
            </div>
        </div>
    </section>
    <section>
        
        <div class="box">
            <div class="container">
             <div id="gestionVacation" style="display: none;" class="form">
                <h2>Vacation d'intervenant</h2>
                <form id="gestionVacation-form" method="post" action="{{ route('calculerVacation') }}">
                @csrf
                  <div class="inputBox">
                    <input type="text" name="tauxHoraire" placeholder="Taux Horaire" >
                  </div>
                  <div class="inputBox">
                    <input type="text" name="nombreHeures" placeholder="Nombre d'heures" >
                  </div>
                  <div class="select">
                       <select name="typeEnseignant" id="typeEnseignant">
                                      <option selected disabled class="selected">Type d'intervenant</option>
                                        <option value="interne">Interne</option>
                                        <option value="externe">Externe</option>
                       </select>
                   </div>
               <button type="submit" class="btn">Calculer</button>  
               <div id="resultat-container" style="display: none;">
                    Le salaire est de : <span id="resultat"></span>
                </div>
                </form>
             </div> 
            </div>
        </div>
    </section>
</div>
<style>
select {
    
    -webkit-appearance:none;
    -moz-appearance:none;
    -ms-appearance:none;
    appearance:none;
    outline:0;
    box-shadow:none;
    border:0!important;
    background: #5c6664;
    background-image: none;
    flex: 1;
    padding: 0 .5em;
    color:#fff;
    cursor:pointer;
    font-size: 1em;
    font-family: 'Open Sans', sans-serif;
 }
 select::-ms-expand {
    display: none;
 }
 .select {
    top: 15px;
    position: relative;
    display: flex;
    width: 18em;
    height: 3em;
    line-height: 3;
    background: #5c6664;
    overflow: hidden;
    border-radius: .25em;
 }
 .select::after {
    content: '\25BC';
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 1em;
    background: #2b2e2e;
    cursor:pointer;
    pointer-events:none;
    transition:.25s all ease;
 }
 .select:hover::after {
    color: #23b499;
 }
 .btn{
    margin-top: 30px;
    color: #fff;
    background-color: aqua;
    border: none;
    border-radius: 5px;
    width: 150px;
    height: 70px;
    font-size: 20px;
 }
</style>
<style>
@import url('https://fonts.googleapis.com/css?familly=Poppins:200,300,400,500,600,700,800,900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background-image: url('{{ asset('RRR.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    
}


.box{
   position: relative;
}

.container{
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}
.form{
    position: relative;
    width: 100%;
    height: 100%;
    padding: 40px;
}
.form h2{
    position: relative;
    color: #333;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;
}
.form h2::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #fff;
}
.form .inputBox{
    width: 100%;
    margin-top: 20px;
}
.form .inputBox input{
    width: 100%;
    background: rgba(255,255,255,0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color: #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.form .inputBox input::placeholder{
    color: #333;
}
.form .inputBox input[type="submit"]{
    background-color: aqua;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#calculer-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('sommedesrecettes') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#resultat').text(response);
                    $('#resultat-container').show();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const formulaireEnseignant = document.getElementById('formulaireEnseignant');
    const gestionVacation = document.getElementById('gestionVacation');

    const btnAjouterEnseignant = document.getElementById('btnAjouterEnseignant');
    const btnGestionVacation = document.getElementById('btnGestionVacation');

    btnAjouterEnseignant.addEventListener('click', () => {
        formulaireEnseignant.style.display = 'block';
        gestionVacation.style.display = 'none';
    });

    btnGestionVacation.addEventListener('click', () => {
        gestionVacation.style.display = 'block';
        formulaireEnseignant.style.display = 'none';
    });

    const typeEnseignantSelect = document.getElementById('typeEnseignant');
    const faculteField = document.getElementById('faculteField');

    typeEnseignantSelect.addEventListener('change', () => {
        if (typeEnseignantSelect.value === 'externe') {
            faculteField.style.display = 'block';
        } else {
            faculteField.style.display = 'none';
        }
    });

    $(document).ready(function() {
        $('#gestionVacation-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('calculerVacation') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#resultat').text(response.resultat);
                    $('#resultat-container').show();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


@endsection