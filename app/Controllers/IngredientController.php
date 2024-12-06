<?php

namespace App\Controllers;

use App\Models\IngredientModel;

class IngredientController extends BaseController
{
    public function afficherIngredients()
    {
        $ingredientModel = new IngredientModel();
        $ingredients = $ingredientModel->findAll();

        return view('ingredients', ['ingredients' => $ingredients]);
        return view('/utilisateur/ingredients', ['ingredients' => $ingredients]);
    }
}

