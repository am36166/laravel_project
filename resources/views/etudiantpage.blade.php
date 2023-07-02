<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>@yield('title')</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
}
body{
    overflow: hidden;
}
.container{
    width: 100%;
    min-height: 100vh;
    background-color: #f3f5f8;
}
nav{
    display: flex;
    width: 100%;
    justify-content: space-around;
    height: 80px;
    line-height: 80px;
    z-index: 111;
}
.logo{
    display: flex;
    font-size: 40px;
    font-weight: 800;
    color: #3d535f;
    letter-spacing: 3px;
    cursor: pointer;
    text-transform: uppercase;
}
b{
    font-size: 70px;
    color: #7f00ff;
}

.links a{
    font-size: 30px;
    color: #3d535f;
    margin: 25px 10px;
}
.wrapper{
    display: flex;
    width: 100%;
    height: calc(100vh - 80px);
    justify-content: center;
    align-items: center;
    padding: 0 10%;
    overflow: hidden;
}
.wrapper::before{
    position: absolute;
    content: '';
    height: 600px;
    width: 600px;
    border-radius: 50%;
    left: -12%;
    top: 40%;
    background: linear-gradient(45deg,#7f00ff,pink);
    animation: object1 6s linear infinite;
}
.wrapper::after{
    position: absolute;
    content: '';
    height: 200px;
    width: 200px;
    border-radius: 50%;
    left: 35%;
    top: 12%;
    background: linear-gradient(45deg,#7f00ff,pink);
    animation: object2 6s linear infinite;
}
@keyframes object1{
    50%{
        left: -13%;
        top: 41%;
    }
}
@keyframes object2{
    50%{
        left: 35%;
        top: 10%;
    }
}
.cols{
    width: 50%;
}
.cols0{
    width: 60%;
    z-index: 5;
}
.topline{
    display: block;
    position: relative;
    font-size: 35px;
    letter-spacing: 5px;
    color:#3d535f;
}
.topline::after{
    position: absolute;
    content: '';
    height: 4px;
    width: 45px;
    bottom: 10px;
    background-color: #7f00ff;
}
h1{
    display: block;
    font-size: 7em;
    font-weight: 900;
    color: #3d535f;
}
.multiText{
    color: #7f00ff;
    text-transform: capitalize;
}
p{
    display: flex;
    width: 90%;
    font-size: 1.2em;
    color: #3d535f;
}
.btns{
    width: 100%;
    position: relative;
    left: 150px;
}
button{
    outline: none;
    border: none;
    cursor: pointer;
    font-size: 25px;
    font-weight: 400;
    color: #fff;
    background-color: #3d535f;
    padding: 8px 14px;
    margin: 40px 5px;
    letter-spacing: 2px;
    text-transform: capitalize;
    box-shadow: 0 15px 10px rgb(0, 0, 0, 0.4);
}
button:hover{
    background-color: #7f00ff;
}
.imgbox{
    position: relative;
    width: 100%;
    height: 100%;
}
.imgbox img{
    position: relative;
    height: 100%;
    width: calc(130% - 80px);
    top: 0px;
    right: 50px;
    transform: rotateY('180deg');
    animation: animateUser 4s linear infinite;
}
@keyframes animateUser{
    50%{
        right: 30px;
        top: -90px;
    }
}
.imgbox #splash{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-35deg);
    width: 160%;
    filter: saturate(200%);
    animation: animate 4s linear infinite;
}
@keyframes animate{
    50%{
        top: 49%;
        left: 51%;
        width: 155%;
    }
}
</style>

    <div class="container">
        <nav>
            <div class="logo">DreamVerse<b>.</b></div>
=======
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <style>
        .img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f5f5;
        }
        .content-wrapper {
            flex-grow: 1;
            padding: 20px;
        }
        .alert {
            margin-bottom: 10px;
            border-radius: 5px;
        }
        /* Personnalise la navbar */
        .main-header.navbar {
            background-color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-header.navbar .nav-link {
            color: #fff;
            transition: color 0.3s ease;
        }
        .main-header.navbar .nav-link:hover {
            color: #ffc107;
        }
        /* Personnalise la sidebar */
        .main-sidebar.sidebar-dark-primary {
            background-color: #333;
        }
        .main-sidebar.sidebar-dark-primary .nav-sidebar .nav-link {
            color: #fff;
        }
        .profile-img {
            display: block;
            margin: 0 auto;
            max-width: 200px;
        }
        @import url(https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700,400|Titillium+Web:400,600,700,300);
        @import url(https://fonts.googleapis.com/css?family=Dosis:400,300,500);

        * {
          box-sizing: border-box;
        }

        ::-webkit-input-placeholder {
          color: #e4e4e4;
        }

        body {
          width: 100%;
          height: 100%;
          margin: 0;
          padding: 0;
          font-family: 'Dosis', sans-serif;
        }

        .card {
          width: 400px;
          margin: 50px auto;
          text-align: center;
          padding: 10px;
          color: #000;
          box-shadow: 0 0 10px rgba(55, 55, 55, .5);
          background-color: #fff;
          border-radius: 4px;
        }

        .card-img-top {
          width: 80px;
          height: 80px;
          margin: 10px auto;
          margin-top: -30px;
          border-radius: 50%;
          border: 2px solid #000;
          transition: .3s;
        }

        .card-img-top:hover {
          cursor: pointer;
          transform: translateY(-10px) scale(1.3);
        }

        .card-title {
          font-size: 30px;
          padding: 5px;
          font-family: 'PT Sans Narrow', sans-serif;
          margin-bottom: 10px;
        }

        .card-text {
          font-size: 16px;
          line-height: 1.4;
          color: #000;
          margin: 0;
          padding: 0;
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        .card-text p {
          margin: 5px 0;
        }

        .card-text p:nth-child(2) {
          font-weight: bold;
          font-size: 18px;
        }

        .card-text p:last-child {
          font-weight: 500;
          font-size: 16px;
          margin-top: 10px;
        }

        .card-text a {
          transition: .2s;
        }

        .card-text a:hover {
          color: #999;
        }

        .main-header.navbar.expanded {
            flex-grow: 1;
        }

        /* Styles pour la sidebar réduite */
        .main-sidebar.collapsed {
            width: 50px;
            transition: width 0.3s ease;
        }
        @yield('style')
    </style>
</head>
<body>  
    <div class="wrapper">
       <nav class="main-header navbar navbar-expand navbar-dark bg-dark ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="sidebarToggle"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
>>>>>>> 236910e7e7e9051c87a0f35f2e34eca57a3dc0db
        </nav>
          <div class="col-md-12">
                            <div class="card-body">    
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

        
        <div class="wrapper">
            <div class="cols cols0">
                <span class="topline">Hello</span>
                <h1><span class="multiText"></span></h1>
                <p>We wish you a nice experience in our space.</p>
                <div class="btns">
                    <button>Etudiant</button>
                    <button>Space</button>
                </div>
            </div>
            <div class="cols cols1">
                <div class="imgbox">
                    <img src="purple-watercolor-splatter-texture-1-removebg-preview.png" id="splash">
                    <img src="iStock-1084948986-removebg-preview.png">
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="header">
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

                         
          </div>
    </div>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        var typeEffect = new Typed(".multiText",{
            strings : ["Welcomme","To your","Space"],
            loop : true,
            typeSpeed : 100,
            backSpeed : 80,
            backDelay : 1500
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</body>
</html>
