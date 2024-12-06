<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'email', 'mot_de_passe'];

    // Fonction pour inscrire un utilisateur
    public function inscrire($nom, $email, $mot_de_passe)
    {
        if ($this->where('email', $email)->first()) {
            return false; // Email déjà utilisé
        }

        $data = [
            'nom' => $nom,
            'email' => $email,
            'mot_de_passe' => password_hash($mot_de_passe, PASSWORD_BCRYPT),
        ];

        return $this->save($data);
    }

    // Fonction pour se connecter
    public function seConnecter($email, $mot_de_passe)
    {
        $utilisateur = $this->where('email', $email)->first();

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            return $utilisateur;
        }

        return false;
    }
    
}
