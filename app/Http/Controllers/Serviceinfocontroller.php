<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash ;

class Serviceinfocontroller extends Controller
{
    public function  indexespace(){
                return view('serviceinfo');
    }
    
    public function index(){
      
       $etudiants = Etudiant::all() ;
      
      return view('liste',compact('etudiants'));

    }

    public function store(Request $request){
             $id = $request->input('id') ;
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
            
                return to_route('listes')->with('update','Les informations ont été mises à jour avec succès');
        }
           return to_route('listes');
         
    }

    public function supprimer($id)
    {
        
        $etudiant = Etudiant::find($id);
        if ($etudiant) {
            $user = User::where('user_id',$etudiant->user_id)->first();
            if($user) $user->delete();
            $etudiant->delete();

            return redirect()->back()->with('success', 'L\'élément a été supprimé avec succès.');
        } else {
      
            return redirect()->back();
        }
    }


            public function ajouteretudiant(Request $request){
      
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
              'urlimg'  => $request->file('image')->store('profiletud','public'),//inserer la photo Ds le Dossier 
             'date_naissance' => $request->datenaissance,
             'user_id' => $userid,
             'filiere_id' => '3',
         ]);

             
                     
             return to_route('listes')->with('ajout','L\'etudiant a été Bien Ajouté');
     
          }
     
            
}

    


