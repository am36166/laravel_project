@extends('responsablemohamed')
@section('respfil')


<section>
        
        <div class="box">
            <div class="container">
               <div class="form">
                <h2>Rubrique et Montant</h2>
                <form method="POST" action="{{ route('rep') }}">
                @csrf
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="rubrique" value="indemnite" id="indemnite-checkbox" onclick="toggleMontantInput('indemnite-checkbox', 'indemnite-montant')">
                <label class="form-check-label" for="indemnite-checkbox">Indemnité</label>
            </div>
            <div class="form-text mt-2" id="indemnite-montant" style="display: none;">
                Montant :
                <input type="text" name="montant_indemnite" >
            </div>
        </div>
       
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="rubrique" value="departement" id="departement-checkbox" onclick="toggleMontantInput('departement-checkbox', 'departement-montant')">
                <label class="form-check-label" for="departement-checkbox">Département</label>
            </div>
            <div class="form-text mt-2" id="departement-montant" style="display: none;">
                Montant :
                <input type="text" name="montant_departement">
            </div>
        </div>
      
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="rubrique" value="materiel" id="materiel-checkbox" onclick="toggleSubRubriques('materiel-checkbox', 'materiel-subrubriques')">
                <label class="form-check-label" for="materiel-checkbox">Matériel</label>
            </div>
            <div class="form-text mt-2" id="materiel-montant" style="display: none;">
                Montant :
                <input type="text" name="montant_materiel">
            </div>
            <div id="materiel-subrubriques" style="display: none;">
                <div class="ms-4">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sousRubrique" value="amenagement" id="amenagement-checkbox" onclick="toggleMontantInput('amenagement-checkbox', 'amenagement-montant')">
                            <label class="form-check-label" for="amenagement-checkbox">Aménagement</label>
                        </div>
                        <div class="form-text mt-2" id="amenagement-montant" style="display: none;">
                            Montant :
                            <input type="text" name="montant_amenagement" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sousRubrique" value="fourniture" id="fourniture-checkbox" onclick="toggleMontantInput('fourniture-checkbox', 'fourniture-montant')">
                            <label class="form-check-label" for="fourniture-checkbox">Fourniture</label>
                        </div>
                        <div class="form-text mt-2" id="fourniture-montant" style="display: none;">
                            Montant :
                            <input type="text" name="montant_fourniture">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sousRubrique" value="bureau" id="bureau-checkbox" onclick="toggleMontantInput('bureau-checkbox', 'bureau-montant')">
                            <label class="form-check-label" for="bureau-checkbox">Bureau</label>
                        </div>
                        <div class="form-text mt-2" id="bureau-montant" style="display: none;">
                            Montant :
                            <input type="text" name="montant_bureau" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sousRubrique" value="pc" id="pc-checkbox" onclick="toggleMontantInput('pc-checkbox', 'pc-montant')">
                            <label class="form-check-label" for="pc-checkbox">PC</label>
                        </div>
                        <div class="form-text mt-2" id="pc-montant" style="display: none;">
                            Montant :
                            <input type="text" name="montant_pc" >
                        </div>
                    </div>
                 <div class="mb-3">
                    @foreach($rubriques as $rubrique)
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sousRubrique" value="{{ $rubrique->nom }}" id="{{ $rubrique->nom }}-checkbox" onclick="toggleMontantInput('{{ $rubrique->nom }}-checkbox', '{{ $rubrique->nom }}-montant')">
                                <label class="form-check-label" for="{{ $rubrique->nom }}-checkbox">{{ $rubrique->nom }}</label>
                            </div>
                            <div class="form-text mt-2" id="{{ $rubrique->nom }}-montant" style="display: none;">
                                Montant :
                                <input type="text" name="montant_{{ $rubrique->nom }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Calculer</button>
                  
                </form>
               </div> 
            </div>
        </div>
    </section>

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
    color: #eee;
}
.form .inputBox input[type="submit"]{
    background-color: aqua;
    margin: 40px;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
.form .inputBox input[type="reset"]{
    background-color: aqua;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
.btn{
    margin-top: 30px;
    color: #fff;
    background-color: aqua;
    border: none;
    border-radius: 5px;
    width: 150px;
    height: 50px;
    font-size: 20px;
 }
</style>
<script>
    function toggleMontantInput(checkboxId, montantId) {
        const checkbox = document.getElementById(checkboxId);
        const montantInput = document.getElementById(montantId);
        if (checkbox.checked) {
            montantInput.style.display = 'block';
        } else {
            montantInput.style.display = 'none';
        }
    }

    function toggleSubRubriques(checkboxId, subRubriquesId) {
        const checkbox = document.getElementById(checkboxId);
        const subRubriques = document.getElementById(subRubriquesId);
        if (checkbox.checked) {
            subRubriques.style.display = 'block';
        } else {
            subRubriques.style.display = 'none';
        }
    }
</script>




@endsection












