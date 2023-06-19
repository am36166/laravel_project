@extends('responsablefil')
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
    <div id="formulaireEnseignant" style="display: none;">
        <form method="POST" action="{{ route('storeenseignant') }}">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" name="nom">
                </div>
                <div class="col">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" name="prenom">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="typeEnseignant" class="form-label">Type d'enseignant :</label>
                    <select class="form-select" name="typeEnseignant" id="typeEnseignant">
                        <option value="interne">Interne</option>
                        <option value="externe">Externe</option>
                    </select>
                </div>
                <div class="col" id="faculteField" style="display: none;">
                    <label for="faculte" class="form-label">Nom de la faculté :</label>
                    <input type="text" class="form-control" name="faculte">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
    <div id="gestionVacation" style="display: none;">
        <form id="gestionVacation-form" method="post" action="{{ route('calculerVacation') }}">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="tauxHoraire" class="form-label">Taux horaire :</label>
                    <input type="text" class="form-control" name="tauxHoraire">
                </div>
                <div class="col">
                    <label for="nombreHeures" class="form-label">Nombre d'heures :</label>
                    <input type="text" class="form-control" name="nombreHeures">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="typeEnseignant" class="form-label">Type d'enseignant :</label>
                    <div>
                        <input type="checkbox" name="typeEnseignant" value="interne" id="interneCheckbox">
                        <label for="interneCheckbox">Interne</label>
                    </div>
                    <div>
                        <input type="checkbox" name="typeEnseignant" value="externe" id="externeCheckbox">
                        <label for="externeCheckbox">Externe</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm">Calculer</button>
                </div>
                <div id="resultat-container" style="display: none;">
                    Le salaire est de : <span id="resultat"></span>
                </div>
            </div>
        </form>
    </div>
</div>
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