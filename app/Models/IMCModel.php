<?php

namespace App\Models;

use CodeIgniter\Model;

class IMCModel extends Model
{
    protected $table = 'imc';
    protected $primaryKey = 'id';
    protected $allowedFields = ['utilisateur_id', 'poids', 'taille', 'date_calcul', 'valeur'];

    // Méthode pour calculé l'IMC
    public function calculerIMC($poids, $taille)
    {
        if ($taille > 0) {
            return round($poids / ($taille * $taille), 2);
        }

        return 0;
    }
}
