<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
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
<div class="header">
    <div class="side-nav">
        <div class="user">
            <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="user-img">
        <div>
            <h2>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</h2>
            <p>thomas@xyz.com</p>
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
    <div class="main-content">
        <div class="content"> 
                          <div class="col-md-8">
                          @if (session()->has('update'))
                                <div class="alert alert-success my-3">
                                    {{ session('update') }}
                                </div>
                                @endif
                                
                             @if (session()->has('successpai'))
                                <div class="alert alert-success my-3">
                                    {{ session('successpai') }}
                                </div>
                                @endif

                                @if (session()->has('error'))
                                <div class="alert alert-success my-3">
                                    {{ session('error') }}
                                </div>
                                @endif

                                @if (session()->has('nok'))
                                <div class="alert alert-success my-3">
                                    {{ session('nok') }}
                                </div>
                                @endif
                               
                            </div>
                        </div>

                         @yield('studentcontent')
          </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>