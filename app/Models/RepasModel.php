<?php

namespace App\Models;

use CodeIgniter\Model;

class RepasModel extends Model
{
    protected $table = 'repas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'typeRepas', 'utilisateur_id','jour'];

    // Récupérer les repas avec leurs ingrédients
    public function getRepasWithIngredients($id)
    {
        return $this->select('repas.*, ingredients.nom AS ingredient_nom, repas_ingredients.quantite')
                    ->join('repas_ingredients', 'repas_ingredients.repas_id = repas.id')
                    ->join('ingredients', 'ingredients.id = repas_ingredients.ingredient_id')
                    ->where('repas.id', $id)
                    ->findAll();
    }
}
