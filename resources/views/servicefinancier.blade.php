
@section('title','Service financier')
@section('studentcontent')
     

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

<div class="bannerVideo" id="dlideShow">
            <video src="pexels-evgenia-kirpichnikova-5956456 (1080p).mp4" type="video/mp4" autoplay loop muted class="active">
        </div>
    <div class="container">    
        <nav>
            <img src="cover-removebg-preview.png" class="logo">
        </nav>
        <div class="text-box">
            <p>*</p>
            <h1>WelCoMe</h1>
            <h3>To dreamverse</h3>


            <div class="row">
              <a href="">New Day <span>&#x27F6;</span></a>
              <a href="">New Mission <span>&#x27F6;</span></a>
              <span>Each of us has a talent that distinguishes us</span>
            </div>

            
        </div>

    </div>

    <div class="header">
    <div class="side-nav">
        
        <ul>
            <li><i class="uil uil-estate"></i><a href="{{ route('servicefin') }}">HOME</a></li>
            <li><i class="uil uil-invoice"></i><a href="{{ route('etat') }}">Etat de paiement</a></li>
            <li><i class="uil uil-sitemap"></i><a href="{{ route('repartir') }}">Repartition</a></li>
            <li><i class="uil uil-receipt"></i><a href="{{ route('recette') }}">Etat des recettes</a></li>
            <li><i class="uil uil-laptop-connection"></i><a href="{{ route('rub') }}">Gestion Des Rubriques</a></li>
        </ul>

        <ul>
            <li><i class="uil uil-signout"></i><a href="{{ route('logout') }}">Deconection</a></li>
        </ul>
    </div>

</div>
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
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}
.container{
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    padding: 0 8%;
    position: relative;
}
nav{
    display: flex;
    width: 100%;
    align-items: center;
    flex-wrap: wrap;
    padding: 5px 0;
}
.logo{
    width: 300px;
    cursor: pointer;
}
.text-box{
    color: #fff;
    position: absolute;
    bottom: 8%;
}
.text-box p{
    font-size: 50px;
    font-weight: 600;
}
.text-box h1{
    font-size: 190px;
    line-height: 160px;
    margin-left: -10px;
    color: transparent;
    -webkit-text-stroke: 1px #fff;
    background: url(back.png);
    -webkit-background-clip: text;
    background-position: 0 0;
    animation: back 20s linear infinite;
}
@keyframes back{
    100%{
        background-position: 2000px 0;
    }
}




.text-box h3{
    font-size: 40px;
    font-weight: 600;
}
.text-box .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 30px;
}
.text-box a{
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    margin-right: 20px;
    border: 2px solid #fff;
    display: flex;
    align-items: center;
}
.text-box a span{
    font-size: 30px;
    line-height: 15px;
    margin-left: 5px;
}
.bannerVideo{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.bannerVideo video{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
}
.bannerVideo video.active{
    opacity: 1;

}
</style>
</body>
</html>



