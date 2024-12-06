<?php
namespace App\Controllers;
use \App\Models\adminModel;
use App\Models\UtilisateurModel;  
class User extends BaseController
{
    public function index()
    {
        $utilisateurModel = new UtilisateurModel();
    
        // Récupérer tous les utilisateurs
        $utilisateurs = $utilisateurModel->findAll();
    
        // Vérifiez si des utilisateurs sont retournés
        if (!$utilisateurs) {
            $utilisateurs = []; // Assurez-vous que c'est un tableau vide en cas d'absence de résultats
        }
    
        // Passer les utilisateurs à la vue
        return view('utilisateurs', ['utilisateurs' => $utilisateurs]);
    }
    
}

