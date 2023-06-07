<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB ;
use App\Models\etudiant_declarevirement;
use Symfony\Component\HttpFoundation\Request;


class servicefinancier extends Controller
{
    public function  indexfinancier(){
        return view('servicefinancier');
}

public function repartir(){

    //calcul la somme des recettes 
    
    $montantTotal = DB::table('declarevirements')->sum('montant') ;
    $resultat = [];

    // Répartition des montants sur les rubriques principales
    $resultat['indemnites'] = $montantTotal * 0.4;
    $resultat['universite'] = $montantTotal * 0.125;
    $resultat['departement'] = $montantTotal * 0.025;
    $resultat['faculte'] = $montantTotal * 0.25;
  // Répartition du montant de la rubrique faculte sur les sous-rubriques
        $resultat['gestion_faculte'] = $resultat['faculte'] * 0.4; 
        $resultat['cfc'] = $resultat['faculte'] * 0.2;
        $resultat['fonctionnaire'] = $resultat['faculte'] * 0.2;
        $resultat['gestion_filiere'] = $resultat['faculte'] * 0.2;
        $resultat['materiel'] = $montantTotal * 0.2;
        return view('repartirprog', compact('resultat'));

    }
  
    public function indexetatpaiement(){
        $etudiants = DB::table('etudiants')
        ->select('cne', 'nom_e', 'prenom_e', 'urlimg')
        ->get();
    
    foreach ($etudiants as $etudiant) {
        $paiements = DB::table('etudiant_declarevirements AS ev')
            ->join('declarevirements AS v', 'ev.num_vir', '=', 'v.num_vir')
            ->where('ev.cne', $etudiant->cne)
            ->select('v.montant', 'v.montant_valide','v.date_vir' ,'v.urlrecu' , 'v.num_vir')
            ->get();
    
        $etudiant->paiements = $paiements;
    }
    
       return view('etatpaiement', compact('etudiants')); 
   }

   public function validerPaiement(Request $request, $numVir)
{
    $result = DB::table('declarevirements')
                ->where('num_vir', $numVir)
                ->update(['montant_valide' => 1]);

           
    if ($result) {
        return redirect()->route('etat')->with('success', 'Paiement validé avec succès.');
    } else {
        return redirect()->back()->with('error', 'Virement non trouvé.');
    }
}

}
