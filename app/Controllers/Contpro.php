<?php

namespace App\Controllers;
use \App\Models\adminModel;
use App\Models\UtilisateurModel;

class Contpro extends BaseController
{
    // Méthode pour admin/index

    
    public function index()
    {
        return view('admin/index'); // Charge la vue 'index.php' dans le dossier admin
    }

    // Méthode pour admin/commande
    public function commandee()
    {
        return view('admin/useri'); // Charge la vue 'useri.php' dans le dossier admin
    }
    
    public function analys()
    {
        return view('admin/analytics'); // Charge la vue 'commande.php' dans le dossier admin
    }
    public function shop()
    {
        return view('admin/ingred'); // Charge la vue 'commande.php' dans le dossier admin
    }
    public function loginn()
    {
        return view('admin/form'); // Charge la vue 'commande.php' dans le dossier admin
    }
    public function logout()
    {
        $session=session();
        $session->destroy();
        return view('admin/form'); // Charge la vue 'commande.php' dans le dossier admin
    }
    public function validation(){
        $email=$this->request->getPost('Login');
        $psd=$this->request->getPost('password');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'Login' => 'required|valid_email',
            'password' => 'required',
        ]);
        
    
    $adminModel = new \App\Models\adminModel();

    
    
    $admin = $adminModel->checkAdmin($email, $psd);
    if (!$validation->withRequest($this->request)->run()) {
        // Retourner les erreurs à la vue
        return view('admin/form', [
            'validation' => $validation,
        ]);
    }

    // Charger le modèle
    $adminModel = new \App\Models\AdminModel();

    // Vérifie les identifiants (email et mot de passe)
    $admin = $adminModel->checkAdmin($email, $psd);

    if (!$admin) {
        // Identifiants incorrects
        return view('admin/form', [
            'error' => 'Email ou mot de passe incorrect.',
        ]);
    }
    $session = session();
        $session->set([
            'user_name' => $admin['nom'] . ' ' . $admin['prenom'],
            'is_logged_in' => true,
        ]);


    // Authentification réussie : Rediriger vers la page d'accueil admin
    
     return redirect()->to(base_url('admin/index'));

    
   
}


}
