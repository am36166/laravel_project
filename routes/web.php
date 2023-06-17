<?php


use App\Models\User;
use App\Http\Controllers\logincon ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiantcontroller;
use App\Http\Controllers\Generpdf;
use App\Http\Controllers\responsablefilcontroller;
use App\Http\Controllers\servicefinancier;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Serviceinfocontroller;
use Symfony\Component\Routing\Route as RoutingRoute;


Route::get('/', function () {
  return view('layout') ;
})->name('acceuil');


Route::get('/login',function (){
   return view('Connexion');
})->name('login');

Route::get('/motdepasseoublie',function (){
  return view('reinitialisation');
})->name('oublimotdepasse');

Route::post('/motdepasseoublie/modif',[Etudiantcontroller::class,'reset'])->name('oublie');

// Connexion Et Deconnexion 

Route::post('/login',[logincon::class,'login']);
   
Route::get('/logout',[logincon::class, 'logout'])->name('logout');

Route::get('/form',[Etudiantcontroller::class,'index'])->name('form') ; 

Route::post('/form/store',[Etudiantcontroller::class,'store'])->name('storeetud') ; 
 
//restrction sur les pages qui demandent une connexion

Route::prefix('etudiantpage')->middleware(['auth', 'Role:0'])->group(function (){
  Route::get('/', [Etudiantcontroller::class, 'indexetudiant'])->name('etudiant');
  Route::get('/modifier/{id}', [Etudiantcontroller::class, 'indexform'])->name('updatedata') ;
  Route::post('/modifier/{id}', [Etudiantcontroller::class, 'updatestore'])->name('updatestore') ;
  Route::get('/Pdf/{id}', [Generpdf::class, 'genererPDF'])->name('Pdf') ;
  Route::any('/paiement/{id}', [Etudiantcontroller::class, 'paiement'])->name('paiement') ;
  Route::post('/paiementstore/{id}', [Etudiantcontroller::class, 'storepaiement'])->name('paiementstore') ;
  Route::get('/profile/{id}', [Etudiantcontroller::class, 'indexprofile'])->name('profile') ;
  Route::get('/historique/{id}', [Etudiantcontroller::class, 'historique'])->name('historique');
});
      
Route::prefix('responsableFil')->middleware(['auth', 'Role:1'])->group(function (){
  Route::get('/',[responsablefilcontroller::class, 'indexresp'])->name('responsableFil');
  Route::get('/progemplois',[responsablefilcontroller::class, 'indexeprog'])->name('progemplois');
  Route::any('/repartirmontant',[responsablefilcontroller::class, 'repartirMontant'])->name('rep'); 
  Route::get('/statutpaiement',[responsablefilcontroller::class, 'etatpaiement'])->name('statutpaiement');
  Route::get('/ajoutenseiganant',[responsablefilcontroller::class, 'displayform'])->name('ajoutenseiganant');
  Route::post('/enregistrerenseignant',[responsablefilcontroller::class, 'ajoutenseignant'])->name('storeenseignant');
  Route::get('/listenseignant',[responsablefilcontroller::class, 'liste'])->name('listens');
  Route::post('/valider-paiement/{numVir}', [responsablefilcontroller::class, 'validerPaiement'])
    ->name('validerpaiement');
  Route::get('/progemploi', [responsablefilcontroller::class, 'repartir'])
    ->name('etatprog');
});

Route::prefix('servicefin')->middleware(['auth', 'Role:2'])->group(function (){
  Route::get('/',[servicefinancier::class, 'indexfinancier'])->name('servicefin');
  Route::get('/etatpaiement',[servicefinancier::class, 'indexetatpaiement'])->name('etat');
  Route::get('/repartir',[servicefinancier::class, 'programme'])->name('repartir');
  Route::post('/repartir/programme',[servicefinancier::class, 'repartir'])->name('repartirprog');
  Route::post('/valider-paiement/{numVir}', [servicefinancier::class, 'validerPaiement'])
    ->name('valider_paiement');
  Route::get('/etatrecette',[servicefinancier::class, 'indexrecette'])->name('recette');
  Route::post('/etatrecette',[servicefinancier::class, 'sommerecette'])->name('sommedesrecettes');
});


Route::prefix('serviceinf')->middleware(['auth', 'Role:3'])->group(function (){
   Route::get('/',[Serviceinfocontroller::class, 'indexespace'])->name('serviceinf');
   Route::get('/listes',[Serviceinfocontroller::class, 'index'])->name('listes');
   Route::post('/modifier',[Serviceinfocontroller::class, 'store'])->name('storemodif');
   Route::get('/supprimer-etudiant/{id}',[Serviceinfocontroller::class, 'supprimer'])->name('supprimeretud');
   Route::post('/Ajoutetudiant',[Serviceinfocontroller::class, 'ajouteretudiant'])->name('ajoutetudiant');

});
