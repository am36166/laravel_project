@extends('main')
@section('title','Service Informatique')
@section('studentcontent')
          <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
           
            <a href="#" class="navbar-brand">Service Informatique</a>

          
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
                            <a href="{{ route('listes') }}" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Liste des étudiants</p>
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
         @yield('liste')
       
    </div>
@endsection