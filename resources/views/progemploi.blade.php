@extends('responsablefil')
@section('respfil')
 <div class="container">
    <h1>Rubriques et montants</h1>
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












