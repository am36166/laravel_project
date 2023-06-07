@extends('etudiantpage')
@section('title','Espace etudiant')
@section('studentcontent')

<form action="{{ route('paiementstore',['id' => $etudiant->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label >Type de paiement:</label>
        <select name="type_paiement"  class="form-control" required>
            @if (Session::get('type_paiement') == 'facilite')
               <option value="facilite">Paiements échelonnés</option>
            @else
        <option value="unique">Paiement unique</option>
        <option value="facilite">Paiements échelonnés</option>
    @endif
        </select>
    </div>

    <div class="form-group">
        <label >Montant:</label>
        <input type="number" name="montant" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="date_transactions">Type de Virement:</label>
        <input type="text" name="type_virement"  class="form-control" required>
    </div>

    <div class="form-group">
        <label for="date_transactions">Date de transaction:</label>
        <input type="date" name="date_transaction"  class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>


@endsection