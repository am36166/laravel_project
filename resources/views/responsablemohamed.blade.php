@extends('main')
@section('title','Responsable Filiere')
@section('studentcontent')
  


<div class="header">
    <div class="side-nav">
        
        <ul>
            <li><i class="uil uil-estate"></i><a href="{{ route('responsableFil') }}">HOME</a></li>
            <li><i class="uil uil-invoice"></i><a href="{{ route('ajoutenseiganant') }}">Gestion des enseignants</a></li>
            <li><i class="uil uil-sitemap"></i><a href="{{ route('statutpaiement') }}">Etat de paiement</a></li>
            <li><i class="uil uil-receipt"></i><a href="{{ route('etatprog') }}">Repartition</a></li>
            <li><i class="uil uil-laptop-connection"></i><a href="{{ route('progemplois') }}">Gestion Besoin</a></li>
        </ul>

        <ul>
            <li><i class="uil uil-signout"></i><a href="{{ route('logout') }}">Deconection</a></li>
        </ul>
    </div>
    @yield('respfil')
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

@endsection
