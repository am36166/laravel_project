<?php

namespace App\Http\Controllers;

use App\Models\declarevirement;
use App\Models\Etudiant;
use App\Models\etudiant_declarevirement;
use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Etudiantcontroller extends Controller

{

    public function index(){

        return view('form');
    }

     public function store(Request $request){
      
           $userid = DB::table('users')->insertGetId([
          'username' => $request->input('login'),
          'password' => Hash::make($request->input('password')),
      ]);
        

       DB::table('etudiants')->insert([
        'cne' => $request->cne,
        'nom_e' => $request->nom,
        'prenom_e' => $request->prenom,
        'telephone' => $request->telephone,
         'adresse' => $request->adresse,
         'urlimg'  => $request->file('image')->store('profiletud','public'),//inserer la photo Ds le Dossier public
        'date_naissance' => $request->datenaissance,
        'user_id' => $userid,
        'filiere_id' => '3',
    ]);
   
        
                
        return to_route('acceuil')->with('success','Votre Inscription a ete Prise En Compte') ;

     }

     public function indexetudiant(){
          $user = Auth::User()->user_id ; 
          $etudiant = DB::table('etudiants')
                  ->join('users', 'users.user_id', '=', 'etudiants.user_id')
                 ->select('etudiants.*')
                 ->where('etudiants.user_id', $user)
                 ->first();

       return view('etudiantpage',compact('etudiant')) ;                

     }

     // formulaire de modification
     public function indexform($id){
        $etudiant = Etudiant::findOrFail($id);               
        return view('updateetudiant',compact('etudiant')) ;
  }

     public function updatestore(Request $request , $id){
           
        $etudiant = Etudiant::findOrFail($id);
         $request->validate([
                'nom' => 'string',
                'prenom' => 'string',
                'adresse' => 'string',
                'telephone' =>'numeric',

        ]);
        
       if($etudiant){
            $etudiant->nom_e = $request->nom ;
            $etudiant->prenom_e = $request->prenom ;
            $etudiant->adresse = $request->adresse ;
            $etudiant->telephone = $request->telephone ;
            $etudiant->save() ;
            
                return to_route('etudiant')->with('update','Les informations ont été mises à jour avec succès');
        }
           return to_route('profile');

     }


  public function indexprofile($id){
    $etudiant = Etudiant::findOrFail($id);               
    return view('profile',compact('etudiant')) ;
}

   public function paiement(Request $request ,  $id){
        $etudiant = Etudiant::findOrFail($id);          
        return view('paiement',compact('etudiant'));
    }
   

    public function storepaiement(Request $request,$id){
        $etudiant = Etudiant::findOrFail($id);
         $cne = $etudiant->cne ;
       
         // Valider les données du formulaire
         $request->validate([
            'montant' => 'required',
            'type_virement' => 'required',
            'date_transaction' => 'required',
            'recu' => 'required|file|mimes:pdf|max:2048',
        ]);
        
    
        // Enregistrer les informations de paiement dans la table "virement"
        $virement = DB::table('declarevirements')->insertGetId([
            'montant' => $request->montant,
            'type_vir' => $request->type_virement,
            'date_vir' => $request->date_transaction,
            'urlrecu' => $request->file('recu')->store('profiletud','public'),
        ]);


        // Enregistrer la relation de clé étrangère dans la table "etudiantvirement"
        DB::table('etudiant_declarevirements')->insert([
            'num_vir' => $virement,
            'cne' => $cne,
        ]);

        // Rediriger ou retourner une réponse réussie
        return to_route('etudiant')->with('successpai', 'Paiement enregistré avec succès !');
 }


     public function historique($id){
          
        $etudiant = Etudiant::findOrFail($id);     
        $etudiantVirement = $etudiant->virements()->pluck('num_vir')->toArray();
        $infosvirements=declarevirement::whereIn('num_vir',$etudiantVirement)->get();
        if( $etudiantVirement) return view('historiquepaiement',compact('infosvirements','etudiant'));
       
         return to_route('etudiant')->with('nok','Vous n\'avez effectuer aucun paiement');

     }

     
    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'cne' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $etudiant = etudiant::where('cne', $request->cne)->first();
        $util = User::where('username', $request->username)->first();

        if (!$etudiant || $util !== $request->username) {
            return redirect()->to_route('oublimotdepasse')->withErrors(['error' => 'Étudiant introuvable. Veuillez vérifier vos informations.']);
        }

        $util->password = Hash::make($request->new_password);
        $util->save();


        return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès. Veuillez vous connecter avec votre nouveau mot de passe.');
    }





    }
   

