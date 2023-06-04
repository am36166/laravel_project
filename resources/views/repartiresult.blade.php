@extends('responsablefil')
@section('respfil')
     <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Montants alloués aux rubriques</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Rubrique</th>
                                <th scope="col">Montant alloué</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Indemnité</td>
                                <td>{{ $montantsRubriques['indemnite'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Université</td>
                                <td>{{ $montantsRubriques['universite'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Département</td>
                                <td>{{ $montantsRubriques['departement'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Faculté</td>
                                <td>{{ $montantsRubriques['faculte'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Materiel</td>
                                <td>{{ $montantsRubriques['materiel'] ?? 0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Sous-rubriques de la rubrique "Faculté"</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @if(isset($montantsRubriques['gestion_faculte']))
                            <li>Montant alloué pour la sous-rubrique "Gestion de la Faculté" : {{ $montantsRubriques['gestion_faculte'] }}</li>
                        @endif
                        @if(isset($montantsRubriques['cfc']))
                            <li>Montant alloué pour la sous-rubrique "CFC" : {{ $montantsRubriques['cfc'] }}</li>
                        @endif
                        @if(isset($montantsRubriques['fonctionnaire']))
                            <li>Montant alloué pour la sous-rubrique "Fonctionnaire" : {{ $montantsRubriques['fonctionnaire'] }}</li>
                        @endif
                        @if(isset($montantsRubriques['gestion_filiere']))
                            <li>Montant alloué pour la sous-rubrique "Gestion de la Filière" : {{ $montantsRubriques['gestion_filiere'] }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Sous-rubriques de la rubrique "Materiel" -->
    @if(isset($montantsRubriques['materiel']) && $montantsRubriques['materiel'] > 0 && (isset($montantsRubriques['amenagement']) || isset($montantsRubriques['fourniture']) || isset($montantsRubriques['bureau']) || isset($montantsRubriques['pc'])))
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Sous-rubriques de la rubrique "Materiel"</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            @if(isset($montantsRubriques['amenagement']))
                                <li>Montant alloué pour la sous-rubrique "Aménagement" : {{ $montantsRubriques['amenagement'] }}</li>
                            @endif
                            @if(isset($montantsRubriques['fourniture']))
                                <li>Montant alloué pour la sous-rubrique "Fourniture" : {{ $montantsRubriques['fourniture'] }}</li>
                            @endif
                            @if(isset($montantsRubriques['bureau']))
                                <li>Montant alloué pour la sous-rubrique "Bureau" : {{ $montantsRubriques['bureau'] }}</li>
                            @endif
                            @if(isset($montantsRubriques['pc']))
                                <li>Montant alloué pour la sous-rubrique "PC" : {{ $montantsRubriques['pc'] }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
    @endif
    @foreach($errors as $rubrique => $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endsection