<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB ;


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
        $etudiants = DB::select("
        SELECT e.cne, e.nom_e, e.prenom_e, e.urlimg, COUNT(DISTINCT ev.num_vir) AS nombre_virements, SUM(v.montant) AS somme_montants
        FROM etudiants e
        LEFT JOIN etudiant_declarevirements ev ON e.cne = ev.cne
        LEFT JOIN declarevirements v ON ev.num_vir = v.num_vir
        GROUP BY e.cne, e.nom_e, e.prenom_e, e.urlimg
    ");

                 
    return view('etatpaiement', ['etudiants' => $etudiants]);

    }
}
