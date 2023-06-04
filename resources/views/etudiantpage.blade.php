<!DOCTYPE html>
<html>
<head>
    <title>Espace Etudiant</title>
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
  color: #000; /* Modifier la couleur du texte */
  box-shadow: 0 0 10px rgba(55, 55, 55, .5);
  background-color: #fff; /* Ajouter une couleur de fond */
  border-radius: 4px;
}

.card-img-top {
  width: 80px;
  height: 80px;
  margin: 10px auto;
  margin-top: -30px;
  border-radius: 50%;
  border: 2px solid #000; /* Modifier la couleur de la bordure */
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
  color: #000; /* Modifier la couleur du texte */
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

</style>
</head>
<body>  
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">
                    <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="img" alt="Student Profile">
                </span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{ route('profile', ['id' => $etudiant->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('updatedata', ['id' => $etudiant->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Modifier mes informations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Pdf', ['id' => $etudiant->id]) }}" class="nav-link">
                                <i class="fa-solid fa-file"></i>
                                <p>Attestation d'inscription</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('paiement', ['id' => $etudiant->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Déclarer mes paiements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('historique', ['id' => $etudiant->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Historiques des paiements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Se déconnecter</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Content Wrapper -->
        <div class="content-wrapper mt-2">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">    
                                @if (session()->has('update'))
                                <div class="alert alert-success my-3">
                                    {{ session('update') }}
                                </div>
                                @endif

                                @if (session()->has('success'))
                                <div class="alert alert-success my-3">
                                    {{ session('success') }}
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

                                @yield('studentcontent')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>