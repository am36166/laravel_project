<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\intervenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash ;
class responsablefilcontroller extends Controller
{
 

        public function indexresp(){
              return view('responsablefil');
        } 

        
      public function indexeprog(){

        $rubriques = DB::table('rubrique_variable')->get();
        return view('progemploi',['rubriques' => $rubriques]) ;
     }

       
      public function displayform(){
        return view('ajoutenseiganant');
      }

     public function etatpaiement(){
        $responsableId = Auth::user()->user_id;

        $etudiants = DB::table('etudiants')
            ->join('filieres', 'etudiants.filiere_id', '=', 'filieres.id')
            ->join('responsablefilieres', 'filieres.id_resp', '=', 'responsablefilieres.id_resp')
            ->where('responsablefilieres.user_id', $responsableId)
            ->select('etudiants.cne', 'etudiants.nom_e', 'etudiants.prenom_e', 'etudiants.urlimg')
            ->get();
      
        foreach ($etudiants as $etudiant) {
            $paiements = DB::table('etudiant_declarevirements AS ev')
                ->join('declarevirements AS v', 'ev.num_vir', '=', 'v.num_vir')
                ->where('ev.cne', $etudiant->cne)
                ->select('v.montant', 'v.montant_valide', 'v.date_vir', 'v.urlrecu', 'v.num_vir')
                ->get();
    
            $etudiant->paiements = $paiements;
        }
    
        return view('statutpaiement', compact('etudiants'));
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


     public function repartir() {
  
        $user = Auth::User()->user_id ; 
        

        $filiere =  DB::table('responsablefilieres')
        ->join('users', 'responsablefilieres.user_id', '=', 'users.user_id')
        ->join('filieres', 'responsablefilieres.id_resp', '=', 'filieres.id_resp')
        ->where('users.user_id', $user)
        ->select('filieres.nom_fil','filieres.id')
        ->first();
        
      
       
       

        $montantTotal = DB::table('declarevirements') 
        ->join('etudiant_declarevirements', 'declarevirements.num_vir', '=', 'etudiant_declarevirements.num_vir')
        ->join('etudiants', 'etudiant_declarevirements.cne', '=', 'etudiants.cne')
        ->join('filieres', 'etudiants.filiere_id', '=', 'filieres.id')
        ->where('filieres.nom_fil', $filiere->nom_fil)
        ->where('declarevirements.comptabilise', 0)
        ->where('declarevirements.montant_valide', 1)
        ->sum('declarevirements.montant');
     
   
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

       if ($montantTotal != 0) {

       $numProg = DB::table('progemplois')->insertGetId([
          'financ_id' => 1, 
          'filiere_id' =>  $filiere->id
      ]);
      DB::table('recettes')->insert([
          'total_m' => $montantTotal,
          'num_prog' => $numProg
      ]);
     // Comptabilise les montants 
   DB::table('declarevirements')->where('montant_valide', 1)->where('comptabilise', 0)->update(['comptabilise' => 1]);


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

       return  view('repartirprogramme',compact('resultat'));
    }

    public function calculerVacation(Request $request)
    {
        $tauxHoraire = $request->input('tauxHoraire');
        $nombreHeures = $request->input('nombreHeures');
        $typeEnseignant = $request->input('typeEnseignant');

        $tauxIgr = ($typeEnseignant === 'interne') ? 0.38 : 0.3;
        $resultat = $tauxHoraire * $nombreHeures * $tauxIgr;
        return response()->json(['resultat' => $resultat]);

   
        }
         
        public function compte(Request $request)
        {
           
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);
    
           
            $user = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 1,
            ];
            $user = DB::table('users')->insertGetId($user);
    
           
            $responsable = [
                'nom_resp' => $request->nom,
                'prenom_resp' => $request->prenom,
                'user_id' => $user,
            ];

            DB::table('responsablefilieres')->insert($responsable);
            $responsableId = DB::getPdo()->lastInsertId();

            $filiere = [
                'nom_fil' => $request->filiere,
                'id_resp' => $responsableId,
                'montant_form' => '25000',
            ];
            DB::table('filieres')->insert($filiere);
    
              return to_route('form')->with('reussie','Votre Compte a ete Bien Enregistre');
        }
    }

   







