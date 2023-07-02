@extends('serviceamine')
@section('servfin')
    <section>
        
        <div class="box">
            <div class="container">
               <div class="form">
                <h2>Ajouter une rubrique</h2>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                <form method="POST" action="{{ route('rubriquestore') }}">
                @csrf
                  <div class="inputBox">
                    <input type="text" name="nom" id="nom" placeholder="Nom de la rubrique">
                  </div>
                  <button type="submit" class="btn">Ajouter</button>
                </form>
               </div> 
            </div>
        </div>
    </section>
<style>
     @import url('https://fonts.googleapis.com/css?familly=Poppins:200,300,400,500,600,700,800,900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background-image: url('{{ asset('RRR.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    
}


.box{
   position: relative;
}

.container{
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}
.form{
    position: relative;
    width: 100%;
    height: 100%;
    padding: 40px;
}
.form h2{
    position: relative;
    color: #333;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;
}
.form h2::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #fff;
}
.form .inputBox{
    width: 100%;
    margin-top: 20px;
}
.form .inputBox input{
    width: 100%;
    background: rgba(255,255,255,0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color: #333;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.form .inputBox input::placeholder{
    color: #333;
}
.form .inputBox input[type="submit"]{
    background-color: aqua;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}
.btn{
    margin-top: 30px;
    color: #fff;
    background-color: aqua;
    border: none;
    border-radius: 5px;
    width: 150px;
    height: 50px;
    font-size: 20px;
 }
</style>
@endsection