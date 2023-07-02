
@section('title','Profile')
<<<<<<< HEAD
=======
@section('style')
<style>
  .profile-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh; 
}
  
  .profile-picture {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
  }
  
  .profile-picture img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
  
  .profile-name {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
  }
  
  .profile-card {
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
  }
  
  .profile-details h6 {
      font-weight: bold;
      margin-bottom: 5px;
  }
  
  .profile-details p {
      margin: 0;
      color: #555;
      text-align: center;
  }
</style>
@endsection
>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db
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
<style>
    @import url('https://fonts.googleapis.com/css?familly=Poppins:200,300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
:root
{
    --clr: #eaeaea;
}
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: var(--clr);
}
.card
{
   position: relative;
   width: 320px;
   height: 430px;
   display: flex;
   flex-direction: column;
   justify-content: space-between;
}
.card .box
{
    position: relative;
    width: 110%;
    height: 200px;
    background: #f00;
    border-radius: 15px;
}
.card .box:nth-child(1)::before
{
    content: '';
    position: absolute;
    top: 106px;
    left: -1px;
    width: 20px;
    height: 20px;
    background: transparent;
    z-index: 10;
    border-bottom-left-radius: 20px;
    box-shadow: -6px 6px var(--clr);
}
.card .box:nth-child(1)::after
{
    content: '';
    position: absolute;
    bottom: -1px;
    left: 105px;
    width: 20px;
    height: 20px;
    background: transparent;
    z-index: 10;
    border-bottom-left-radius: 20px;
    box-shadow: -6px 6px var(--clr);
}
.card .box:nth-child(2)
{
   background: #fff; 
   height: 220px;
   width: 100%;
}
.card .box:nth-child(2)::before
{
    content: '';
    position: absolute;
    bottom: 106px;
    left: -1px;
    background: transparent;
    width: 20px;
    height: 20px;
    z-index: 10;
    border-top-left-radius: 20px;
    box-shadow: -6px -6px var(--clr);
}
.card .box:nth-child(2)::after
{
    content: '';
    position: absolute;
    top: -1px;
    left: 109px;
    background: transparent;
    width: 20px;
    height: 20px;
    z-index: 10;
    border-top-left-radius: 20px;
    box-shadow: -6px -6px var(--clr);
}
.card .circle
{
  position: absolute;
  top: 50%;
  left: -70px;
  transform: translateY(-50%);
  width: 180px;  
  height: 180px;
  background: #0f0;
  border-radius: 50%;
  border: 10px solid var(--clr);
}
.card .circle .imgBx, 
.card .box .imgBx
{
    position: absolute;
    inset: 0;
    overflow: hidden;
    border-radius: 50%;
}
.card .box .imgBx
{
    border-radius: 15px;
}
.card .circle .imgBx img,
.card .box .imgBx video
{
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.card .box .content
{
    position: absolute;
    inset: 0;
    padding: 30px 10px 20px;
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 20px;
}
.card .box .content h2
{
    width: 100%;
    padding-left: 120px;
    text-transform: uppercase;
    font-size: 1.15em;
    letter-spacing: 0.1em;
    font-weight: 600;
    line-height: 1.1em;
    color: #333;
}
.card .box .content h2 span
{
    font-size: 0.75em;
    font-weight: 400;
    letter-spacing: 0.05em;
    color: #e91e63;
    text-transform: initial;
}
.card .box .content ul
{
    position: relative;
    top: 15px;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    width: 100%;
    padding: 0 10px;
    justify-content: space-evenly;
}
.card .box .content ul li
{
    list-style: none;
    display: flex;
    flex-direction: column;
    text-align: center;
    padding: 0 10px;
    font-size: 0.85em;
    font-weight: 500;
    color: #999;
}
.card .box .content ul li:not(:last-child)
{
    border-right: 1px solid #ccc;
}
.card .box .content ul li span
{
    font-size: 1.65em;
    color: #333;
}
.card .box .content button
{
   position: relative;
   top: -20px;
   padding: 8px 30px;
   border: none;
   outline: none;
   background: #03a9f4;
   border-radius: 30px;
   color: #fff;
   font-size: 1em;
   letter-spacing: 0.2em;
   text-transform: uppercase;
   font-weight: 500;
   cursor: pointer;
   border: 5px solid var(--clr);
   box-shadow: 0 0 0 10px #fff;
   transition: 0.5s;
}
.card .box .content button:hover
{
    letter-spacing: 0.5em;
    background: #ff3d7f;
}
.card .box .content button::before
{
    content: '';
    position: absolute;
    top: 24px;
    left: -29px;
    width: 20px;
    height: 20px;
    background: transparent;
    border-top-right-radius: 20px;
    box-shadow: 5px -7px #fff;
}
.card .box .content button::after
{
    content: '';
    position: absolute;
    top: 24px;
    right: -29px;
    width: 20px;
    height: 20px;
    background: transparent;
    border-top-left-radius: 20px;
    box-shadow: -5px -7px #fff;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- <link rel="stylesheet" type="text/css" href="Profil_etu.css"> -->
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
    <div class="card">
        <div class="box">
            <div class="imgBx">
            <video autoplay loop muted playsinline id="background-video">
    <source src="{{ asset('flowers_-_68363 (Original).mp4') }}" type="video/mp4">
    <!-- Ajoutez d'autres sources vidéo ici pour la compatibilité avec différents navigateurs -->
</video></div>
        </div>
        <div class="box">
            <div class="content">
                <h2>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}<br><span>{{ $etudiant->date_naissance }}</</span></h2>
                <ul>
                    <li>Cne<span>{{ $etudiant->cne }}</span></li>
                    <li>Telephone<span>{{ $etudiant->telephone }}</span></li>
                </ul>
                
                <button>Profil</button>
            </div>
        </div>
        <div class="circle">
            <div class="imgBx">
                <img src="{{ asset('storage/'.$etudiant->urlimg) }}">
            </div>
        </div>
        
    </div>

    <script>
      const section = document.querySelector("section"),
       overlay = document.querySelector(".overlay"),
       showBtn = document.querySelector(".show-modal"),
       closeBtn = document.querySelector(".closs-btn");

       showBtn.addEventListener("click", () => section.classList.add("active"));

       overlay.addEventListener("click", () => 
       section.classList.remove("active"));

       closeBtn.addEventListener("click", () => 
       section.classList.remove("active"));
    </script>
</body>
</html>