@extends('servicefinancier')
@section('servfin')

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calculer la somme des recettes</div>

                <div class="card-body">
                    <form id="calculer-form" method="POST" action="{{ route('sommedesrecettes') }}">
                        @csrf
                        <div class="form-group">
                            <label for="filiere">Filière :</label>
                            <select name="filiere" class="form-control">
                                <option value="smi">SMI</option>
                                <option value="smpc">SMPC</option>
                                <option value="biologie">Biologie</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Calculer</button>
                    </form>

                    <div id="resultat-container" style="display: none;">
                        La somme des recettes pour la filière sélectionnée est : <span id="resultat"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection