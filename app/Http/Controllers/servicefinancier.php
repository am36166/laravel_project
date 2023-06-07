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

public function repartir()
{
    // Calcul de la somme des recettes
    $montantTotal = DB::table('declarevirements')->where('montant_valide', 1)->sum('montant');
    
    // Répartition des montants sur les rubriques principales
    $resultat = [
        'indemnites' => [
            'prc' => 0.4,
            'montant_rub' => $montantTotal * 0.4
        ],
        'universite' => [
            'prc' => 0.125,
            'montant_rub' => $montantTotal * 0.125
        ],
        'departement' => [
            'prc' => 0.025,
            'montant_rub' => $montantTotal * 0.025
        ],
        'faculte' => [
            'prc' => 0.25,
            'montant_rub' => $montantTotal * 0.25
        ],
        'gestion_faculte' => [
            'prc' => 0.4,
            'montant_rub' => 0
        ],
        'cfc' => [
            'prc' => 0.2,
            'montant_rub' => 0
        ],
        'fonctionnaire' => [
            'prc' => 0.2,
            'montant_rub' => 0
        ],
        'gestion_filiere' => [
            'prc' => 0.2,
            'montant_rub' => 0
        ],
        'materiel' => [
            'prc' => 0.2,
            'montant_rub' => $montantTotal * 0.2
        ]
    ];
  
    // Répartition du montant de la rubrique faculte sur les sous-rubriques
    $resultat['gestion_faculte']['montant_rub'] = $resultat['faculte']['montant_rub'] * $resultat['gestion_faculte']['prc'];
    $resultat['cfc']['montant_rub'] = $resultat['faculte']['montant_rub'] * $resultat['cfc']['prc'];
    $resultat['fonctionnaire']['montant_rub'] = $resultat['faculte']['montant_rub'] * $resultat['fonctionnaire']['prc'];
    $resultat['gestion_filiere']['montant_rub'] = $resultat['faculte']['montant_rub'] * $resultat['gestion_filiere']['prc'];

    // Insérer les enregistrements dans la table "rubrique"
    DB::table('rubriques')->insert([
        [
            'nom_rub' => 'indemnites',
            'prc' => $resultat['indemnites']['prc'],
            'montant_rub' => $resultat['indemnites']['montant_rub']
        ],
        [
            'nom_rub' => 'universite',
            'prc' => $resultat['universite']['prc'],
            'montant_rub' => $resultat['universite']['montant_rub']
        ],
        [
            'nom_rub' => 'departement',
            'prc' => $resultat['departement']['prc'],
            'montant_rub' => $resultat['departement']['montant_rub']
        ],
        [
            'nom_rub' => 'faculte',
            'prc' => $resultat['faculte']['prc'],
            'montant_rub' => $resultat['faculte']['montant_rub']
        ],
        [
            'nom_rub' => 'gestion_faculte',
            'prc' => $resultat['gestion_faculte']['prc'],
            'montant_rub' => $resultat['gestion_faculte']['montant_rub']
        ],
        [
            'nom_rub' => 'cfc',
            'prc' => $resultat['cfc']['prc'],
            'montant_rub' => $resultat['cfc']['montant_rub']
        ],
        [
            'nom_rub' => 'fonctionnaire',
            'prc' => $resultat['fonctionnaire']['prc'],
            'montant_rub' => $resultat['fonctionnaire']['montant_rub']
        ],
        [
            'nom_rub' => 'gestion_filiere',
            'prc' => $resultat['gestion_filiere']['prc'],
            'montant_rub' => $resultat['gestion_filiere']['montant_rub']
        ],
        [
            'nom_rub' => 'materiel',
            'prc' => $resultat['materiel']['prc'],
            'montant_rub' => $resultat['materiel']['montant_rub']
        ]
    ]);

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
