@extends('main')
@section('studentcontent')
          <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
           
            <a href="#" class="navbar-brand">Service Financier</a>

          
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Se déconnecter</a>
                </li>
            </ul>
        </nav>

      
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          
            <div class="sidebar">
              
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('etat') }}" class="nav-link active">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Etat de paiement</p>
                            </a>
                        </li>
                            <li class="nav-item">
                            <a href="{{ route('repartition') }}" class="nav-link active">
                                    <p>Repartition</p>
                            </a>
                        </li>
                    </ul>
                </nav>
              
            </div>
        </aside>
        <div class="content-wrapper">
           
            <section class="content-header">
                <div class="container-fluid">
                </div>
         @yield('servfin')
       
    </div>
@endsection
