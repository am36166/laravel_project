<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--==================== UNICONS ====================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        
        <!--==================== SWIPER CSS ====================-->
        <link rel="stylesheet" href="css/swiper-element.css">
        
        <!--==================== CSS ====================-->
        <link rel="stylesheet" href="css/Page.css">

        <!--==================== CSS ====================-->
        


        <title>Espace Etudiant</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
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
                     <ion-icon name="chatbubble-outline"></ion-icon>historique
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

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <a href="https://www.instagram.com/fsac.formationcontinue" target="_blank" class="home__social-icon">
                                <i class="uil uil-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/fsac.formationcontinue/" target="_blank" class="home__social-icon">
                                <i class="uil uil-facebook-f"></i>
                            </a>
                            <a href="https://fsacfc.ma/brochures/" target="_blank" class="home__social-icon">
                                <i class="uil uil-estate"></i>
                            </a>
                        </div>

                        <div class="home__blob" class="home__img">
                            <svg viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                    165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                    129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                    -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                    
                                    <image class="home__blob-img" x="-12" y="0" xlink:href="wp9432494.jpg"/>
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <h3 class="home__subtitle">Welcome To Your Little Space</h3>
                            <p class="home__description">I hope it be a nice experience</p>
                            <a href="#contact" class="button button--flex">
                                Welcome <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <div class="home__scroll">
                        <a href="#about" class="home__scroll-button button--flex">
                            <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                            <span class="home__scroll-name">Scroll down</span>
                            <i class="uil uil-arrow-down home__scroll-arrow"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <h2 class="section__title">About Univercity</h2>
                <span class="section__subtitle">Faculty of Sciences Aïn Chock</span>

                <div class="about__container container grid">
                    <img src="50027253596_69b2d9af7a_o.jpg" alt="" class="about__img">

                    <div class="about__data">
                        <p class="about__description">The Aïn Chock Faculty of Sciences of Casablanca (FSAC) is one of the 18 establishments of the Hassan II University of Casablanca. 
                            Since its creation in 1981.
                        </p>

                        <div class="about__info">
                            <div>
                                <span class="about__info-title">1200+</span>
                                <span class="about__info-name">Degrees awarded  <br> per year </span>
                            </div>

                            <div>
                                <span class="about__info-title">600+</span>
                                <span class="about__info-name">Etudiants <br> Chercheurs</span>
                            </div>

                            <div>
                                <span class="about__info-title">05+</span>
                                <span class="about__info-name"> Formations  <br> doctorales</span>
                            </div>
                        </div>

                        <div class="about__buttons">
                            <a  href="https://fsac.univh2c.ma" class="button button--flex">
                               Lire Plus <i class="uil uil-download-alt button__icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>


            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section" id="domaine">
                <h2 class="section__title">Domaines d'études</h2>
                <span class="section__subtitle">en bref</span>

                <div class="qualification__container container">
                    <div class="qualification__tabs">
                        <div class="qualification__button button--flex qualification__active" data-target='#education'>
                            <i class="uil uil-graduation-cap qualification__icon"></i>
                            Education
                        </div>

                        <div class="qualification__button button--flex" data-target="#work">
                            <i class="uil uil-briefcase-alt calification__icon"></i>
                            Cycles
                        </div>
                    </div>

                    <div class="qualification__sections">
                        <!--==================== QUALIFICATION CONTENT 1 ====================-->
                        <div class="qualification__content qualification__active" data-content id="education">
                            <!--==================== QUALIFICATION 1 ====================-->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="calification__title"></h3>
                                    <span class="calification__subtitle">Informatique</span>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>
                            
                            <!--==================== QUALIFICATION 2 ====================-->
                            <div class="qualification__data">
                                <div></div>
                                
                                <div>
                                    <span class="qualification__rounder"></span>
                                  
                                </div>

                                <div>
                                    <span class="calification__subtitle">Sciences de l’ingénierie</span>
                                </div>
                            </div>
                            </div>
                        </div>

                                                <!--==================== QUALIFICATION CONTENT 2 ====================-->
                                                <div class="qualification__content" data-content id="work">
                                                    <!--==================== QUALIFICATION 1 ====================-->
                                                    <div class="qualification__data">
                                                        <div>
                                                            <h3 class="calification__title">Licences professionnelles universitaires</h3>
                                                        </div>
                        
                                                        <div>
                                                            <span class="qualification__rounder"></span>
                                                            <span class="qualification__line"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--==================== QUALIFICATION 2 ====================-->
                                                    <div class="qualification__data">
                                                        <div></div>
                                                        
                                                        <div>
                                                            <span class="qualification__rounder"></span>
                                                            
                                                        </div>
                        
                                                        <div>
                                                            <h3 class="calification__title">Masters spécialisés universitaires
                                                            </h3>
                                                        </div>
                                                    </div>
                        
                                                  
                    </div>
                </div>
            </section>

            <!--==================== Formation ====================-->
            <section class="services section" id="formation">
                <h2 class="section__title">Formation</h2>
                <span class="section__subtitle">et domaines</span>

                <div class="services__container container grid">
                    <!--==================== SERVICES 1 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-web-grid services__icon"></i>
                            <h3 class="services__title">Informatique
                            </h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View More
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Infrormatique <br> introduction:</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-cervices grid">
                                    <h4>Computer science is concerned with the implementation of scientific methods to process information by means of computers.
                                         In particular, it enriches the following areas:</h4>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Business management and financial exchanges.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Communications of all kinds.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Robot control in factories and machine design.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Artificial intelligence: understanding images, video, language, robotics.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Synthesis of images for cinema or television.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Pattern recognition on satellite or medical images.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Natural language processing and automatic deduction.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Scientific calculations or complex techniques.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--==================== SERVICES 2 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-arrow services__icon"></i>
                            <h3 class="services__title">Sciences de <br> l'ingénieur</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View More
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Sciences de l'ingénieur <br> introduction</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-cervices grid">
                                         <p>The engineering sciences bring together all the disciplines necessary for the study of these systems, in particular:</p>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>mechanics: study of movements (kinematics) and efforts (statics), arrangement of the parts of a mechanism, etc.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>electronics: components, electronic boards, signal study, etc. </p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>automatic: control part of the system</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>electrical engineering: production, transport, distribution and use of electrical energy.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>industrial computing: programming of industrial systems.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>process engineering: control of the industrial transformation of raw materials into products
                                         produced by a succession of operations.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--==================== SERVICES 3 ====================-->
                    <div class="services__content">
                        <div>
                            <i class="uil uil-pen services__icon"></i>
                            <h3 class="services__title">Formation <br> types</h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View More
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Formation <br> type</h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-cervices grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Licences Professionnelles Universitaires accrédités</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Masters spécialisés Universitaires accrédités</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== FC ====================-->
            <section class="portfolio section" id="fc">
                <h2 class="section__title">Formation Continue</h2>
                <span class="section__subtitle">Most recent work</span>

                <div class="portfolio__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== FC 1 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="outils-table.jpg" alt="" class="" portfolio__img>

                            <div class="portfolio__data">
                               <h3 class="portfolio__title">Bâtiment et travaux publics</h3>

                            </div>
                        </div>

                        <!--==================== FC 2 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="screws-for-plastic-automotive.jpg" alt="" class="" portfolio__img>

                            <div class="portfolio__data">
                               <h3 class="portfolio__title">Industrie automobile</h3>
                            </div>
                        </div>

                        <!--==================== FC 3 ====================-->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="strom-2030-gruenbuch.jpg" alt="" class="" portfolio__img>

                            <div class="portfolio__data">
                               <h3 class="portfolio__title">Energies renouvelables</h3>
                            </div>
                        </div>
                        <!--==================== FC 4 ====================-->
                    <div class="portfolio__content grid swiper-slide">
                        <img src="istockphoto-1226413184-640x640.jpg" alt="" class="" portfolio__img>

                        <div class="portfolio__data">
                           <h3 class="portfolio__title">Informatique</h3>
                        </div>
                    </div>
                

                <!--==================== FC 5 ====================-->
                <div class="portfolio__content grid swiper-slide">
                    <img src="thumb-1920-456498.jpg" alt="" class="" portfolio__img>

                    <div class="portfolio__data">
                       <h3 class="portfolio__title">Électronique</h3>
                    </div>
                </div>
            

            <!--==================== FC 6 ====================-->
            <div class="portfolio__content grid swiper-slide">
                <img src="containers logistics careers.jpg" alt="" class="" portfolio__img>

                <div class="portfolio__data">
                   <h3 class="portfolio__title">Logistique</h3>
                   
                </div>
            </div>
                    </div>

                    
        

                    <!-- Add Arows -->
                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </section>


            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Contact Nous</h2>
                <span class="section__subtitle">Get in touch</span>

                <div class="contact__container container grid">
                   <div>
                    <div class="contact__information">
                        <i class="uil uil-phone contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Call</h3>
                            <span class="contact__subtile"> +212 614-796 448 <br>+212 703-811 820</span>
                        </div>
                    </div>

                    <div class="contact__information">
                        <i class="uil uil-envelope contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Email</h3>
                            <span class="contact__subtile">fsacfc.contact@gmail.com</span>
                        </div>
                    </div>

                    <div class="contact__information">
                        <i class="uil uil-map-marker contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Location</h3>
                            <span class="contact__subtile">Faculté des sciences Ain Chock, Km 8, Route d'El Jadida, BP: 5366
                                Maarif, Casablanca 20100 Maroc</span>
                        </div>
                    </div>
                   </div>
                   
                   <form action="" class="contact__form grid">
                         <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label">Name</label>
                                <input type="text" class="contact__input">
                            </div>
                            <div class="contact__content">
                                <label for="" class="contact__label">Email</label>
                                <input type="email" class="contact__input">
                            </div>
                         </div>
                         <div class="contact__content">
                            <label for="" class="contact__label">Project</label>
                            <input type="text" class="contact__input">
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__label">Message</label>
                            <textarea name="" id="" cols="0" rows="7" class="contact__input"></textarea>
                        </div>

                        <div>
                            <a href="#" class="button button--flex">
                                Send Message
                                <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                   </form>
                </div>
            </section>
        </main>
   <!-- Footer -->
        <footer>
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <ul class="social_icon">
                <li><a href="https://web.facebook.com/fsac.formationcontinue"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li><a href="https://www.youtube.com/channel/UCLqjRJDvOXgWXcXZpenExZw"><ion-icon name="logo-youtube"></ion-icon></a></li>
                <li><a href="https://www.flickr.com/people/188979619@N02/"><ion-icon name="logo-flickr"></ion-icon></a></li>
            </ul>
            <ul class="menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#domaine">Domaines</a></li>
                <li><a href="#fc">FC</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <p>@2023 created by lotunny | All Rights Reserved</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!--==================== SCROLL TOP ====================-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!--==================== SWIPER JS ====================-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--==================== Page JS ====================-->
        <script>
            let profile = document.querySelector('.profile');
            let menu = document.querySelector('.menu');
            profile.onclick = function(){
                menu.classList.toggle('active');
            }
        </script>
        <script src="js/Page.js"></script> 
    </body>
</html>