<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;

class LoginController
{
    private $username;
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
        $this->username = $_POST['username'] ?? '';
        $this->password = $_POST['password'] ?? '';

        error_log("Nom d'utilisateur reçu: " . $this->username);
        error_log("Mot de passe reçu: " . (empty($this->password) ? "vide" : "non-vide"));

        if ($this->validateInputs()) {
            error_log("Inputs validés");
            $user = UserModel::findByUsername($this->username);

            if ($user) {
                error_log("Utilisateur trouvé. ID: " . $user->getId());
                if (password_verify($this->password, $user->getPassword())) {
                    error_log("Mot de passe correct. Démarrage de la session.");
                    $this->startUserSession($user);
                    error_log("Session started. User ID: " . $_SESSION['user_id'] . ", Username: " . $_SESSION['username']);
                    error_log("Attempting to redirect to dashboard");
                    header('Location: /dashboard');
                    error_log("This line should not be reached if redirect is successful");
                    exit;
                } else {
                    error_log("Mot de passe incorrect");
                    $this->errors[] = "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } else {
                error_log("Aucun utilisateur trouvé avec ce nom d'utilisateur");
                $this->errors[] = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            error_log("Validation des inputs échouée. Erreurs: " . implode(", ", $this->errors));
        }

        error_log("Fin de handleLogin(). Affichage du formulaire avec erreurs.");
        $this->showLoginForm();
    }

    private function validateInputs(): bool
    {
        if (empty($this->username)) {
            $this->errors[] = "Le nom d'utilisateur est requis.";
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
