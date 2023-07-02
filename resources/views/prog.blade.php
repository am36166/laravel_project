@extends('serviceamine')
@section('servfin')


<section>
        
        <div class="box">
            <div class="container">
               <div class="form">
                <h2>Choisir Filiere</h2>
                <form  id="repartition-form" action="{{ route('repartirprog') }}" method="POST">
                @csrf
                <div class="select">
                              <select name="filiere" id="fil">
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
                  <button type="submit" class="btn">Repartir</button>
                </form>
                <div id="resultat-container" style="display: none;">
                        La somme des recettes pour la filière sélectionnée est : <span id="resultat"></span>
                    </div>
               </div> 
            </div>
        </div>
    </section>
<style>
    select {
    -webkit-appearance:none;
    -moz-appearance:none;
    -ms-appearance:none;
    appearance:none;
    outline:0;
    box-shadow:none;
    border:0!important;
    background: #5c6664;
    background-image: none;
    flex: 1;
    padding: 0 .5em;
    color:#fff;
    cursor:pointer;
    font-size: 1em;
    font-family: 'Open Sans', sans-serif;
 }
 select::-ms-expand {
    display: none;
 }
 .select {
    position: relative;
    display: flex;
    width: 18em;
    height: 3em;
    line-height: 3;
    background: #5c6664;
    overflow: hidden;
    border-radius: .25em;
 }
 .select::after {
    content: '\25BC';
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 1em;
    background: #2b2e2e;
    cursor:pointer;
    pointer-events:none;
    transition:.25s all ease;
 }
 .select:hover::after {
    color: #23b499;
 }
 .btn{
    margin-top: 30px;
    color: #fff;
    background-color: aqua;
    border: none;
    border-radius: 5px;
    width: 150px;
    height: 50px;
    font-size: 20px;
 }
 label{
    color:#666;
    font-size: 25px;
    margin-bottom: 25px;
 }
</style>

<style>
    @import url('https://fonts.googleapis.com/css?familly=Poppins:200,300,400,500,600,700,800,900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background-image: url('{{ asset('RRR.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    
}


.box{
   position: relative;
}

.container{
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}
.form{
    position: relative;
    width: 100%;
    height: 100%;
    padding: 40px;
}
.form h2{
    position: relative;
    color: #333;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;
}
.form h2::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #fff;
}
.form .inputBox{
    width: 100%;
    margin-top: 20px;
}
.form .inputBox input{
    width: 100%;
    background: rgba(255,255,255,0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color: #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.form .inputBox input::placeholder{
    color: #eee;
}
.form .inputBox input[type="submit"]{
    background-color: aqua;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
</style>
@endsection