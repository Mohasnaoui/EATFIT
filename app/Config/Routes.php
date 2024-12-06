<?php

use App\Controllers\UtilisateurController;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;
/**
 * 
 * @var RouteCollection $routes
 */
// Page d'accueil ou redirection vers gestion des repas après connexion
$routes->get('/', 'UtilisateurController::index');


// Connexion
$routes->get('/utilisateur/login', 'UtilisateurController::login');
$routes->post('/utilisateur/connexion',[UtilisateurController::class,'connexion']);
// Inscription
$routes->get('/utilisateur/register', 'UtilisateurController::register');
$routes->post('/utilisateur/add', 'UtilisateurController::addUser');

// Déconnexion
$routes->get('/utilisateur/logout', 'UtilisateurController::logout');

// Gestion des repas
$routes->get('/utilisateur/gestion_repas', 'UtilisateurController::gestion_repas');

// Ajouter un repas
$routes->post('/utilisateur/ajouterRepas', 'UtilisateurController::ajouterRepas');

// Supprimer un repas
$routes->get('/utilisateur/supprimerRepas/(:num)', 'UtilisateurController::supprimerRepas/$1');

// Voir les détails d'un repas
$routes->get('/utilisateur/voirRepas/(:num)', 'UtilisateurController::voirRepas/$1');

// Ajouter un ingrédient à un repas
$routes->post('/utilisateur/ajouterIngredient', 'UtilisateurController::ajouterIngredient');

// Supprimer un ingrédient d'un repas
$routes->get('/utilisateur/supprimerIngredient/(:num)/(:num)', 'UtilisateurController::supprimerIngredient/$1/$2');

// Calculer l'IMC
$routes->post('/utilisateur/calculerIMC', 'UtilisateurController::calculerIMC');
$routes->get('/utilisateur/voir_ingredients', 'UtilisateurController::voirIngredients');
// Ajout d'un ingrédient à un repas
$routes->post('utilisateur/ajouterIngredient/(:num)', 'UtilisateurController::ajouterIngredient/$1');
// Liste des ingrédients
$routes->get('utilisateur/listeIngrédients', 'UtilisateurController::listeIngrédients');
$routes->get('/utilisateur/getIngredients/(:num)', 'UtilisateurController::getIngredients/$1');

$routes->get('/', 'Home::index');
$routes->get('/admin/form', 'Contpro::loginn');
$routes->get('/admin/index', 'Contpro::index');
$routes->get('/admin/useri', 'Contpro::commandee');
$routes->get('/admin/analytics', 'Contpro::analys');
$routes->get('/admin/ingred', 'Contpro::shop');
$routes->get('//logout', 'Contpro::logout');
$routes->Post('/form1', 'Contpro::validation');
$routes->Post('/ingredient', 'IngredientController::add');
$routes->get('/admin/useri', 'User::index');
 $routes->get('/utilisateurs', 'User::index');



