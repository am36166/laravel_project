<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--==================== UNICONS ====================-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Espace Etudiant</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    @yield('style')
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">Dreamverse</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list grid">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class="uil uil-estate nav__icon"></i> Home
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class="uil uil-user nav__icon"></i> About
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#domaine" class="nav__link">
                            <i class="uil uil-file-alt nav__icon"></i> Domaines
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#formation" class="nav__link">
                            <i class="uil uil-briefcase-alt nav__icon"></i> Formation
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#fc" class="nav__link">
                            <i class="uil uil-scenery nav__icon"></i> FC
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class="uil uil-message nav__icon"></i> Contacte
                        </a>
                    </li>
                </ul>
                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class="uil uil-moon change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-apps"></i>
                </div>
            </div>
        
            
            <div class="menuToggle"></div>
        <div class="profile">
            <h3>{{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}</h3>
            <div class="imgBx">
                <img src="{{ asset('storage/'.$etudiant->urlimg) }}">
            </div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('profile', ['id' => $etudiant->id]) }}">
                        <ion-icon name="person-outline"></ion-icon>Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('paiement', ['id' => $etudiant->id]) }}">
                        <ion-icon name="chatbubble-outline"></ion-icon>Declaration
                    </a>
                </li>
                <li>
                    <a href="{{ route('historique', ['id' => $etudiant->id]) }}">
                        <ion-icon name="settings-outline"></ion-icon>historique
                    </a>
                </li>
                <li>
                    <a href="{{ route('updatedata', ['id' => $etudiant->id]) }}">
                        <ion-icon name="settings-outline"></ion-icon>Setting
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <ion-icon name="log-out-outline"></ion-icon>Logout
                    </a>
                </li>
            </ul>
        </div>
        </nav>
    </header>
        @yield('content')
       <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li><a href="https://web.facebook.com/FSAC2020/"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="https://www.youtube.com/channel/UCLqjRJDvOXgWXcXZpenExZw"><ion-icon name="logo-youtube"></ion-icon></a></li>
            <li><a href="https://www.flickr.com/people/188979619@N02/"><ion-icon name="logo-flickr"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <p>@2023 created by lotunny | All Rights Reserved</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        let profile = document.querySelector('.profile');
        let menu = document.querySelector('.menu');
        profile.onclick = function(){
            menu.classList.toggle('active');
        }
    </script>
    <script src="nav.js"></script>
</body>
</html>