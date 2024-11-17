<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;

class LoginController
{
    private $email;
    private $password;
    private $errors = [];

    

    public function index()
{
    error_log("LoginController::index() appelée. Méthode: " . $_SERVER['REQUEST_METHOD']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->handleLogin();
    } else {
        $this->showLoginForm();
    }
}

private function handleLogin()
{
    error_log("handleLogin() appelée");
    $this->email = $_POST['email'] ?? '';
    $this->password = $_POST['password'] ?? '';

    error_log("Email reçu: " . $this->email);
    error_log("Mot de passe reçu: " . (empty($this->password) ? "vide" : "non-vide"));

    if ($this->validateInputs()) {
        error_log("Inputs validés");
        $user = UserModel::findByEmail($this->email);
        
        if ($user) {
            error_log("Utilisateur trouvé. ID: " . $user->getId());
            if (password_verify($this->password, $user->getPassword())) {
                error_log("Mot de passe correct. Démarrage de la session.");
                $this->startUserSession($user);
                error_log("Redirection vers /dashboard");
                header('Location: /dashboard');
                exit;
            } else {
                error_log("Mot de passe incorrect");
                $this->errors[] = "Email ou mot de passe incorrect.";
            }
        } else {
            error_log("Aucun utilisateur trouvé avec cet email");
            $this->errors[] = "Email ou mot de passe incorrect.";
        }
    } else {
        error_log("Validation des inputs échouée. Erreurs: " . implode(", ", $this->errors));
    }

    error_log("Fin de handleLogin(). Affichage du formulaire avec erreurs.");
    $this->showLoginForm();
}

    private function validateInputs(): bool
    {
        if (empty($this->email)) {
            $this->errors[] = "L'adresse email est requise.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "L'adresse email n'est pas valide.";
        }

        if (empty($this->password)) {
            $this->errors[] = "Le mot de passe est requis.";
        }

        return empty($this->errors);
    }

    private function startUserSession(UserModel $user): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
    }

    private function showLoginForm()
    {
        $view = new View();
        $view->render('login', [
            'title' => 'Connexion',
            'errors' => $this->errors,
            'hasErrors' => $this->hasErrors()
        ]);
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
