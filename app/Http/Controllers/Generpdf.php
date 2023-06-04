<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\Etudiant;

class Generpdf extends Controller
{

    public function genererPDF($id)
    {
        $etudiant = Etudiant::findOrFail($id);
    
        $dompdf = new Dompdf();
    
        // Chemin d'accès complet à l'image
        $imagePath = public_path('storage/' . $etudiant->urlimg);
    
        // Charge le contenu HTML dans Dompdf
        $html = '
            <html>
            <head>
                <style>
                body {
                    font-family: Arial, sans-serif;
                    font-size: 12px;
                }
                .header {
                    background-color: #1f4e78;
                    color: #ffffff;
                    padding: 10px;
                    text-align: center;
                }
                .etudiant-info {
                    margin-top: 20px;
                    margin-bottom: 40px;
                }
                .etudiant-info h1 {
                    color: #1f4e78;
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                .etudiant-info p {
                    margin-bottom: 5px;
                }
                .photo {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .photo img {
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Informations d\'inscription de l\'étudiant</h1>
                </div>
                <div class="photo">
                    <img src="' . $imagePath . '" alt="Photo de l\'étudiant">
                </div>
                <div class="etudiant-info">
                    <h1>Étudiant:</h1>
                    <p><strong>Nom:</strong> ' . $etudiant->nom_e . '</p>
                    <p><strong>Prénom:</strong> ' . $etudiant->prenom_e . '</p>
                    <p><strong>Adresse:</strong> ' . $etudiant->adresse . '</p>
                    <p><strong>Numéro de Téléphone:</strong> ' . $etudiant->telephone . '</p>
                </div>
               
            </body>
            </html>
        ';
    
        $dompdf->loadHtml($html);
    
        // Définit la taille et l'orientation du papier
        $dompdf->setPaper('A4', 'portrait');
    
        // Rend le contenu HTML en PDF
        $dompdf->render();
    
        // Obtient le contenu PDF généré
        $pdfContent = $dompdf->output();
    
        $dompdf->stream('inscription_etudiant.pdf');

    }
    
 }