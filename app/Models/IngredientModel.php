<?php

namespace App\Models;

use CodeIgniter\Model;

class IngredientModel extends Model
{
    protected $table = 'ingredients'; // Correspond exactement au nom de votre table
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['nom', 'calories_100g', 'carbs', 'prot', 'imagepath', 'type'];

    // Calcul des totaux nutritionnels d'un repas donné
    public function calculerTotauxNutritionnels($repasId)
    {
        // Construction de la requête pour récupérer les totaux nutritionnels
        $builder = $this->db->table('repas_ingredients');
        $builder->select('
            SUM(ingredients.calories_100g * repas_ingredients.quantite / 100) AS total_calories,
            SUM(ingredients.carbs * repas_ingredients.quantite / 100) AS total_carbs,
            SUM(ingredients.prot * repas_ingredients.quantite / 100) AS total_proteins
        ');
        $builder->join('ingredients', 'ingredients.id = repas_ingredients.ingredient_id');
        $builder->where('repas_ingredients.repas_id', $repasId); // Assurer que nous filtrons par repas_id

        // Exécution de la requête et récupération des résultats
        return $builder->get()->getRowArray(); // Retourne un tableau associatif avec les résultats
    }
}


