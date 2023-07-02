
@section('title','Paiement')
@section('studentcontent')
<style>
    .side-nav{
    width: 110px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    padding: 30px 15px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    transition: width 0.5s;
}
.user{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 60px;
    font-size: 12px;
    padding: 10px;
    border-radius: 8px;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
}
.user div{
    display: none;
}
.user h2{
    font-size: 15px;
    font-weight: 600;
    white-space: nowrap;
}
.user-img{
    width: 50px;
    border-radius: 50%;
    margin: auto;
}
ul{
    list-style: none;
    padding: 0 15px;
}
ul li{
    margin: 30px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
ul li i{
    width: 30px;
    margin-right: 0px;
}
ul li a{
    white-space: nowrap;
    display: none;
}
.side-nav:hover{
    width: 250px;
}
.side-nav:hover .user div{
    display: block;
}
.side-nav:hover .user{
    width: 100%;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(5px);
}
.side-nav:hover .user-img{
    margin: 0;
}
.side-nav:hover ul li a{
    display: block;
    text-decoration: none;
}
.side-nav:hover ul li i{
    margin-right: 10px;
}
.side-nav:hover ul li {
    justify-content: flex-start;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <div class="side-nav">
        <div class="user">
            <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="user-img">
        <div>
            <h2>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</h2>
            <p>{{ $etudiant->cne }}</p>
        </div>  
        </div>
        <ul>
            <li><i class="uil uil-estate"></i><a href="{{ route('page', ['id' => $etudiant->id]) }}">HOME</a></li>
            <li><i class="uil uil-user"></i><a href="{{ route('profile', ['id' => $etudiant->id]) }}">PROFILE</a></li>
            <li><i class="uil uil-bill"></i><a href="{{ route('paiement', ['id' => $etudiant->id]) }}">PAIEMENT</a></li>
            <li><i class="uil uil-history"></i><a href="{{ route('historique', ['id' => $etudiant->id]) }}">HISTORIQUE</a></li>
            <li><i class="uil uil-setting"></i><a href="{{ route('updatedata', ['id' => $etudiant->id]) }}">PARAMETRE</a></li>
        </ul>

        <ul>
            <li><i class="uil uil-signout"></i><a href="{{ route('logout') }}">Deconection</a></li>
        </ul>
    </div>
</div>
<section>
        
        <div class="box">
            <div class="container">
               <div class="form">
                <h2>Declaration de Paiement</h2>
                <form action="{{ route('paiementstore',['id' => $etudiant->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="inputBox">
                    <input type="number" name="montant" placeholder="Montant" required>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="type_virement" placeholder="Type de Virement" required>
                  </div>
                  <div class="inputBox">
                    <input type="date" name="date_transaction" placeholder="Date de Transaction" required>
                  </div>
                  <div class="inputBox">
                    <input type="file" name="recu" accept="application/pdf" placeholder="Recu de Paiement" required>
                  </div>
                  <div class="inputBox">
                    <input type="submit" value="Valider">
                  </div>
                </form>
               </div> 
            </div>
        </div>
    </section>
<style>
   @import url('https://fonts.googleapis.com/css?familly=Poppins:200,300,400,500,600,700,800,900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background-image: url('{{ asset('R.png') }}');
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
    color: #eee;
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
</body>
</html>
