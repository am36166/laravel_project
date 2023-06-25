@extends('servicefinancier')
@section('servfin')
<form id="repartition-form" action="{{ route('repartirprog') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="filiere">Choisir une filière :</label>
        <select name="filiere" id="filiere" class="form-control">
            <option value="">-- Sélectionner une filière --</option>
            <option value="SMI">SMI</option>
            <option value="SMPC">SMPC</option>
            <option value="BIOLOGIE">BILOGIE</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Répartir</button>
</form>
@endsection