@extends('etudiantpage')
@section('title','Espace etudiant')
@section('studentcontent')
 
   
<form action="{{ route('paiementstore',['id' => $etudiant->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="form-group">
        <label >Montant:</label>
        <input type="number" name="montant" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="type_virement">Type de Virement:</label>
        <input type="text" name="type_virement"  class="form-control" required>
    </div>

    <div class="form-group">
        <label for="date_transaction">Date de transaction:</label>
        <input type="date" name="date_transaction"  class="form-control" required>
    </div>

    <div class="form-group">
        <label for="recu">Reçu de Paiement:</label>
        <input type="file" name="recu" accept="application/pdf" required>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>

@endsection