@extends('servicefinancier')
@section('servfin')
 <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Ajouter une rubrique</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('rubriquestore') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom de la rubrique</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection