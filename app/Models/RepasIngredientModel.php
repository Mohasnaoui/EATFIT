<?php

namespace App\Models;

use CodeIgniter\Model;

class RepasIngredientModel extends Model
{
    protected $table = 'repas_ingredients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['repas_id', 'ingredient_id', 'quantite'];

    // Calculer les calories totales d'un repas
    public function calculerCaloriesRepas($repasId)
    {
        // Sélectionner la somme des calories pour tous les ingrédients du repas
        $this->select('SUM(ingredients.calories_par_100g * repas_ingredients.quantite / 100) as calories_totales');
        $this->join('ingredients', 'ingredients.id = repas_ingredients.ingredient_id');
        $this->where('repas_ingredients.repas_id', $repasId);

        // Exécuter la requête et récupérer le résultat
        $result = $this->get()->getRow();

        // Retourner les calories totales, ou 0 si aucun résultat
        return $result ? $result->calories_totales : 0;
    }

    // Récupérer les ingrédients d'un repas
    public function getIngredientsForRepas($repasId)
    {
        return $this->select('ingredients.nom, repas_ingredients.quantite')
                    ->join('ingredients', 'ingredients.id = repas_ingredients.ingredient_id')
                    ->where('repas_ingredients.repas_id', $repasId)
                    ->findAll();
    }

}

