<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB ;
use App\Models\etudiant_declarevirement;
use Illuminate\Http\Request;


class servicefinancier extends Controller
{
    public function  indexfinancier(){
        return view('servicefinancier');
}

public function repartir(Request $request)
{
          $filiere = $request->input('filiere') ;
    
          $montantTotal = DB::table('declarevirements') 
          ->join('etudiant_declarevirements', 'declarevirements.num_vir', '=', 'etudiant_declarevirements.num_vir')
          ->join('etudiants', 'etudiant_declarevirements.cne', '=', 'etudiants.cne')
          ->join('filieres', 'etudiants.filiere_id', '=', 'filieres.id')
          ->where('filieres.nom_fil', $filiere)
          ->where('declarevirements.comptabilise', 0)
          ->where('declarevirements.montant_valide', 1)
         ->sum('declarevirements.montant');

         $filiereId = DB::table('filieres')->where('nom_fil', $filiere)->value('id');

         if ($montantTotal != 0) {

         $numProg = DB::table('progemplois')->insertGetId([
            'financ_id' => 1, 
            'filiere_id' =>  $filiereId 
        ]);

        DB::table('recettes')->insert([
            'total_m' => $montantTotal,
            'num_prog' => $numProg
        ]);

       // Comptabilise les montants 

     DB::table('declarevirements')->where('montant_valide', 1)->where('comptabilise', 0)->update(['comptabilise' => 1]);

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

    DB::table('rubrique_progremplois')->insert([
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'indemnites')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'universite')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'departement')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'faculte')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'gestion_faculte')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'cfc')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'fonctionnaire')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'gestion_filiere')->value('id_rub')
        ],
        [
            'num_prog' => $numProg,
            'id_rub' => DB::table('rubriques')->where('nom_rub', 'materiel')->value('id_rub')
        ]
    ]);

}


    return  view('repartirprog',compact('resultat'));
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

  public function indexrecette(){

     return view('recette');
  }


   public function sommerecette(Request $request){

    $filiere = $request->input('filiere') ;

    $Sommedesrecettes = DB::table('declarevirements') 
    ->join('etudiant_declarevirements', 'declarevirements.num_vir', '=', 'etudiant_declarevirements.num_vir')
    ->join('etudiants', 'etudiant_declarevirements.cne', '=', 'etudiants.cne')
    ->join('filieres', 'etudiants.filiere_id', '=', 'filieres.id')
    ->where('filieres.nom_fil', $filiere)
    ->where('declarevirements.comptabilise', 0)
    ->where('declarevirements.montant_valide', 1)
    ->sum('declarevirements.montant');

      return response()->json($Sommedesrecettes);
    }


    public function programme()
    {
        return view('prog');
    }


  
   

}
