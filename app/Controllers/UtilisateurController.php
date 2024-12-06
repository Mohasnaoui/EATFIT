<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\RepasModel;
use App\Models\IngredientModel;
use App\Models\IMCModel;
use App\Models\RepasIngredientModel;

class UtilisateurController extends BaseController
{
    
    // ============================
    // Gestion de la session et de l'authentification
    // ============================

    // Connexion
    public function login()
    {
        return view('auth/login');
    }

    public function connexion()
    {
        $model = new UtilisateurModel();

        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('mot_de_passe');

        $user = $model->seConnecter($email, $mot_de_passe);

        if ($user) {
            session()->set([
                'isLoggedIn' => true,

                    'userId' => $user['id'], //HADA 
                ]);
            
            return redirect()->to('/')->with('succes', '3la slama');
        } else {
            return redirect()->to('/utilisateur/login')->with('error', 'Identifiants incorrects.');
        }
    }


    // Inscription
    public function register()
    {


        return view('auth/register');
    }
    public function addUser()
    {

        $model = new UtilisateurModel();

        $nom = $this->request->getPost('nom');
        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('mot_de_passe');

        if ($model->inscrire($nom, $email, $mot_de_passe)) {
            return redirect()->to('/utilisateur/gestion_repas')->with('success', 'Inscription réussie ! Veuillez vous connecter.');
        } else {
            return redirect()->back()->with('error', 'Échec de l\'inscription. L\'email est déjà utilisé.');
        }
    }
    // Déconnexion
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/utilisateur/login')->with('success', 'Vous êtes déconnecté.');
    }

    // ============================
    // Page d'accueil utilisateur (gestion des repas)
    // ============================

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/utilisateur/login');
        }

        return redirect()->to('/utilisateur/gestion_repas');
    }

    // ============================
    // Gestion des repas (CRUD)
    // ============================

    // Gestion des repas
    public function gestion_repas()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/utilisateur/login');
    }

    $repasModel = new RepasModel();
    $ingredientModel = new IngredientModel();

    $repas = $repasModel->where('utilisateur_id', session()->get('userId'))->findAll();
    $ingredients = $ingredientModel->findAll();

    // Définir les jours de la semaine
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    return view('utilisateur/gestion_repas', [
        'repas' => $repas,
        'ingredients' => $ingredients,
        'daysOfWeek' => $daysOfWeek // Passer les jours à la vue
    ]);
}

    

    

    // Ajouter un repas
  // Ajouter un repas
public function ajouterRepas()
{
    // Instancier le modèle RepasModel
    $repasModel = new RepasModel();

    $nom = $this->request->getPost('nom');
    $jour = $this->request->getPost('jour'); // Assurez-vous que ce champ est envoyé dans la requête POST

    $data = [
        'nom' => $nom,
        'jour' => $jour,
        'utilisateur_id' => session()->get('userId') // Assurez-vous d'inclure l'ID utilisateur si nécessaire
    ];

    // Insérer les données dans la table 'repas'
    $repasModel->insert($data);

    // Message flash pour indiquer que l'ajout a réussi
    session()->setFlashdata('success', 'Repas ajouté avec succès !');
    return redirect()->back();
}

    

    // Supprimer un repas
    public function supprimerRepas($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/utilisateur/login');
    }

    $repasIngredientModel = new RepasIngredientModel();
    // Supprimer d'abord les lignes dans la table repas_ingredients associées à ce repas
    $repasIngredientModel->where('repas_id', $id)->delete();

    // Ensuite, supprimer le repas dans la table repas
    $repasModel = new RepasModel();
    $repasModel->delete($id);

    return redirect()->to('/utilisateur/gestion_repas')->with('success', 'Repas supprimé.');
}


    // Voir les détails d'un repas
    public function voirRepas($repasId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/utilisateur/login');
        }
    
        $repasModel = new RepasModel();
        $ingredientModel = new IngredientModel();
    
        // Récupérer les informations du repas
        $repas = $repasModel->find($repasId);
    
        // Récupérer les ingrédients associés au repas
        $ingredients = $repasIngredientModel->getIngredientsForRepas($repasId);
    
        // Calculer les totaux nutritionnels pour ce repas
        $totaux = $ingredientModel->calculerTotauxNutritionnels($repasId);
    
        return view('details_repas', [
            'repas' => $repas,
            'ingredients' => $ingredients,
            'calories_totales' => $totaux['total_calories'],  // Utilisation des totaux calculés
            'carbs_totaux' => $totaux['total_carbs'],
            'proteins_totaux' => $totaux['total_proteins']
        ]);
    }
    
public function listeIngrédients()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/utilisateur/login');
    }

    $ingredientModel = new IngredientModel();
    $ingredients = $ingredientModel->findAll();

    return view('utilisateur/liste_ingrédients', [
        'ingredients' => $ingredients,
    ]);
}



    // Ajouter un ingrédient à un repas
    public function ajouterIngredient($ingredientId)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/utilisateur/login');
    }

    // Vérifier si un repas a été sélectionné
    $repasId = $this->request->getPost('repas_id'); // ID du repas depuis le formulaire

    if (!$repasId) {
        session()->setFlashdata('error', 'Aucun repas sélectionné.');
        return redirect()->to('/utilisateur/gestion_repas');
    }

    // Récupérer l'ingrédient à ajouter
    $ingredientModel = new IngredientModel();
    $ingredient = $ingredientModel->find($ingredientId);

    if (!$ingredient) {
        session()->setFlashdata('error', 'Ingrédient non trouvé.');
        return redirect()->to('/utilisateur/gestion_repas');
    }

    // Ajouter l'ingrédient au repas
    $repasIngredientModel = new RepasIngredientModel();
    $data = [
        'repas_id' => $repasId,
        'ingredient_id' => $ingredientId,
        'quantite' => $this->request->getPost('quantite'), // Quantité de l'ingrédient
    ];

    $repasIngredientModel->insert($data);

    session()->setFlashdata('success', 'Ingrédient ajouté avec succès au repas.');
    return redirect()->to('/utilisateur/gestion_repas');
}
public function getIngredients($repasId)
{
    $repasIngredientModel = new RepasIngredientModel();
    $ingredients = $repasIngredientModel->getIngredientsForRepas($repasId); // Récupère les ingrédients pour ce repas
    return $this->response->setJSON(['ingredients' => $ingredients]); // Retourne la réponse en format JSON
}
public function calculerTotauxNutritionnels($repasId)
{
    $builder = $this->db->table('repas_ingredients');
    $builder->select('
        SUM(ingredients.calories_100g * repas_ingredients.quantite / 100) AS total_calories,
        SUM(ingredients.carbs * repas_ingredients.quantite / 100) AS total_carbs,
        SUM(ingredients.prot * repas_ingredients.quantite / 100) AS total_proteins
    ');
    $builder->join('ingredients', 'ingredients.id = repas_ingredients.ingredient_id');
    $builder->where('repas_ingredients.repas_id', $repasId);
    
    return $builder->get()->getRowArray();
}



    // ============================
    // pluuuus
   

   
    // pluusss
    

    // Calcul de l'IMC
    public function calculerIMC()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/utilisateur/login');
        }

        $imcModel = new IMCModel();
        $poids = $this->request->getPost('poids');
        $taille = $this->request->getPost('taille');

        $valeurIMC = $poids / (($taille / 100) ** 2);
        $data = [
            'utilisateur_id' => session()->get('userId'),
            'poids' => $poids,
            'taille' => $taille,
            'valeur' => $valeurIMC,
            'date_calcul' => date('Y-m-d H:i:s'),
        ];

        $imcModel->save($data);

        return redirect()->to('/utilisateur/gestion_repas')->with('success', 'IMC calculé : ' . round($valeurIMC, 2));
    }
    
}
