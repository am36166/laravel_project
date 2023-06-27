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
                              <select name="filiere" >
                                      <option selected disabled class="selected">Choisir la filiére</option>
                                          <optgroup label="licence prefessionnelle:">
                                          <optgroup label="Informatique:">
                                            <option value="aasri">AASRI</option>
                                            <option value="asbdr">ASBDR</option>
                                            <option value="daabd">DAABD</option>
                                            <option value="di">DI</option>
                                            <option value="dwm">DWM</option>
                                            <option value="im">IM</option>
                                            <option value="lsi">LSI</option>
                                            <option value="ircc">IRCC</option>
                                            <option value="taw">TAW</option>
                                            <option value="fs-devops">FS and DEVOP</option>
                                           <option value="mispp">MISPP</option>
                                    </optgroup>
                                     <optgroup label="Sciences de l'ingénieur">
                                          <option value="lpeeaii">LPEEAII</option>
                                          <option value="gc">GC</option>
                                          <option value="gese">GESE</option>
                                          <option value="gil">GIL</option>
                                          <option value="ga">GA</option>
                                          <option value="gamur">GAMUR</option>
                                    <option value="tmbtp">TMBTP</option>
                                   </optgroup>
                                   <optgroup label="Masters spécialisés">
                                      <optgroup label="Informatique:">
                                         <option value="bd2c">BD2C</option>
                                         <option value="bisd">BISD</option>
                                         <option value="msi">MSI</option>
                                     </optgroup>
                                 <optgroup label="Sciences de l'ingénieur">
                                         <option value="meeaii">MEEAII</option>
                                         <option value="gl">GL</option>
                                        <option value="ier">IER</option>
                                        <option value="msm">MSM</option>
                                <option value="bimae">BIMAE</option>
                             </optgroup>
                          </optgroup>
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