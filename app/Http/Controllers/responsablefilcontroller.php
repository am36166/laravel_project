<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\intervenant;

class responsablefilcontroller extends Controller
{
    //

        public function indexresp(){
              return view('responsablefil');
        } 

        
      public function indexeprog(){
           return view('progemploi') ;
     }

       
      public function displayform(){
        return view('ajoutenseiganant');
      }

     public function etatpaiement(){
      $etudiants = DB::select("
      SELECT e.cne, e.nom_e, e.prenom_e, e.urlimg, COUNT(DISTINCT ev.num_vir) AS nombre_virements, SUM(v.montant) AS somme_montants
      FROM etudiants e
      LEFT JOIN etudiant_declarevirements ev ON e.cne = ev.cne
      LEFT JOIN declarevirements v ON ev.num_vir = v.num_vir
      GROUP BY e.cne, e.nom_e, e.prenom_e, e.urlimg
  ");

               
  return view('statutpaiement', ['etudiants' => $etudiants]);

  }

   

     public function repartirMontant(Request $request) {

        // collecter les recettes depuis la table virement 
        $montantTotal = DB::table('declarevirements')->sum('montant') ;
        // Recuperer les Montants fournis par l'utilisateur 
        $montantIndemnite = $request->input('montant_indemnite', 0);
        $montantUniversite = $request->input('montant_universite', 0);
        $montantDepartement = $request->input('montant_departement', 0);
        $montantFaculte = $request->input('montant_faculte', 0);
        $montantAmenagement = $request->input('montant_amenagement', 0);
        $montantFourniture = $request->input('montant_fourniture', 0);
        $montantBureau = $request->input('montant_bureau', 0);
        $montantPC = $request->input('montant_pc', 0);
     
        $montantsRubriques = []; // table pour stocker les Rubriques et les montans octroyees a ces dernieres apres la repartition
        $errors = [] ;   // Gestion d'erreur si l'utilisateur demande un ,ontqnt aui depasse le plafond

       
        $montantsRubriques['indemnite'] =  $montantTotal * 0.4;
        $montantsRubriques['universite'] =  $montantTotal* 0.125;
        $montantsRubriques['departement'] = $montantTotal * 0.025;
        $montantsRubriques['faculte'] =  $montantTotal * 0.25;
        $montantsRubriques['materiel'] =  $montantTotal * 0.2;
      
       

       
       if (isset($montantIndemnite) && $montantIndemnite > 0 ){
                               if( $montantsRubriques['indemnite'] >= $montantIndemnite){
                                $montantsRubriques['indemnite'] -= $montantIndemnite;
                               } else $errors['indemnite']= "Le Montant demandé Depasse le montant assigné pour indemnite";
       } 
      
       if (isset($montantUniversite) && $montantUniversite>0  ){
                            if($montantsRubriques['universite'] >= $montantUniversite){
                                $montantsRubriques['universite'] -= $montantUniversite;
                            } else $errors['universite']= "Le Montant demandé depasse le montant assigné pour universite";
       }
      
       if (isset($montantDepartement) && $montantDepartement>0 ){
                            if($montantsRubriques['departement'] >= $montantDepartement){
                                $montantsRubriques['departement'] -= $montantDepartement;
                            }  else $errors['departement']= "Le Montant demandé depasse le montant assigné pour departement";
       } 
     
       if (isset($montantFaculte) && $montantFaculte>0){
                            if($montantsRubriques['faculte'] >=  $montantFaculte){
                                $montantsRubriques['faculte'] -= $montantFaculte;
                            }   else $errors['faculte']= "Le Montant demandé depasse le montant assigné pour faculte";
       } 
    
        
        $montantsRubriques['gestion_faculte'] = $montantsRubriques['faculte'] * 0.4 ;
        $montantsRubriques['cfc'] = $montantsRubriques['faculte'] * 0.2;
        $montantsRubriques['fonctionnaire'] = $montantsRubriques['faculte'] * 0.2;
        $montantsRubriques['gestion_filiere'] = $montantsRubriques['faculte'] * 0.2;

        if ( isset($montantAmenagement) && $montantAmenagement>0 ){
                                  if($montantsRubriques['materiel'] >= $montantAmenagement){
                                    $montantsRubriques['materiel'] -= $montantAmenagement;
                                    $montantsRubriques['amenagement'] = $montantAmenagement;
                                 }else $errors['amenagement']= "Le Montant demandé depasse le montant octroyé au Materiel";
         } 

        
        if (isset($montantFourniture) && $montantFourniture>0){
                               if( $montantsRubriques['materiel'] >= $montantFourniture){
                                         $montantsRubriques['materiel'] -= $montantFourniture;
                                         $montantsRubriques['fourniture'] = $montantFourniture;
                                }else $errors['fourniture']= "Le Montant demandé depasse le montant octroyé au Materiel";    
         } 

        if (isset($montantBureau) && $montantBureau>0 ){
                              if($montantsRubriques['materiel'] >= $montantBureau){
                                $montantsRubriques['materiel'] -= $montantBureau;
                                $montantsRubriques['bureau'] = $montantBureau;
                               } else $errors['bureau']= "Le Montant demandé depasse le montant octroyé au Materiel";
                              }
           

             if (isset($montantPC) && $montantPC>0 ){
                              if($montantsRubriques['materiel'] >=  $montantPC){
                                $montantsRubriques['materiel'] -=  $montantPC;
                                $montantsRubriques['pc'] = $montantPC;
                                } else $errors['pc']= "Le Montant demandé depasse le montant octroyé au Materiel";
                              }
                            
            
            
           
        return view('repartiresult')->with('montantsRubriques', $montantsRubriques)->with('errors', $errors);

            }

            public function ajoutenseignant(Request $request){

                         $nom = $request->input('nom');
                         $prenom = $request->input('prenom');
                         $typeIntervenant = $request->input('typeEnseignant');
                         $faculte = $request->input('faculte');

                        $idIntervenant = DB::table('intervenants')->insertGetId([
                                      'nom_en' => $nom,
                                     'prenom_en' => $prenom
                                    ]);

                          if ($typeIntervenant === "interne") {
                                       DB::table('professeurlocals')->insert([
                                        'id_interv' => $idIntervenant
                                         ]);
                           } else if ($typeIntervenant === "externe") {
                                       DB::table('professeurexternes')->insert([
                                     'id_interv' => $idIntervenant,
                                     'nom_inst'=> $faculte
                                      ]);
                          }  

                          return to_route('ajoutenseiganant')->with('succes','l\'enseigant a été Bien Ajouté');
                }

   
                    public function liste(){

                      $professeursLocaux = intervenant::join('professeurlocals', 'intervenants.id_interv', '=', 'professeurlocals.id_interv')
                      ->select('intervenants.nom_en', 'intervenants.prenom_en', DB::raw("'local' as type"))
                      ->get();
          
                     $professeursExternes = intervenant::join('professeurexternes', 'intervenants.id_interv', '=', 'professeurexternes.id_interv')
                      ->select('intervenants.nom_en', 'intervenants.prenom_en', DB::raw("'externe' as type"))
                      ->get();
          
                      $enseignants = $professeursLocaux->concat($professeursExternes);

          
                    
                      return view('listens', compact('enseignants'));
                     }

}
