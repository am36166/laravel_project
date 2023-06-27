@extends('servicefinancier')
@section('servfin')
<form id="repartition-form" action="{{ route('repartirprog') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="filiere">Choisir une filière :</label>
         <div class="form-group">
                              <select name="filiere"  class="form-control">
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
    <button type="submit" class="btn btn-primary">Répartir</button>
</form>
@endsection