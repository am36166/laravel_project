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
</div>

<script>
    const typeEnseignantSelect = document.getElementById('typeEnseignant');
    const faculteField = document.getElementById('faculteField');

    typeEnseignantSelect.addEventListener('change', () => {
        if (typeEnseignantSelect.value === 'externe') {
            faculteField.style.display = 'block';
        } else {
            faculteField.style.display = 'none';
        }
    });

    document.getElementById('btnAjouterEnseignant').addEventListener('click', () => {
        document.getElementById('formulaireEnseignant').style.display = 'block';
    });
</script>

@endsection