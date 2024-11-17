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
        error_log("Méthode index() appelée");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            error_log("Formulaire soumis");
            $this->handleLogin();
        } else {
            error_log("Affichage du formulaire");
            $this->showLoginForm();
        }
    }

    private function handleLogin()
    {
        $this->email = $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';

        if ($this->validateInputs()) {
            $user = UserModel::findByEmail($this->email);
            
            if ($user && password_verify($this->password, $user->getPassword())) {
                // Authentification réussie
                $this->startUserSession($user);
                header('Location: /dashboard');
                exit;
            } else {
                $this->errors[] = "Email ou mot de passe incorrect.";
            }
        }

        $this->showLoginForm();
    }

    private function validateInputs(): bool
    {
        $this->validateEmail();
        $this->validatePassword();

        return empty($this->errors);
    }

    private function validateEmail(): void
    {
        if (empty($this->email)) {
            $this->errors[] = "L'adresse email est requise.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "L'adresse email n'est pas valide.";
        }
    }

    private function validatePassword(): void
    {
        if (empty($this->password)) {
            $this->errors[] = "Le mot de passe est requis.";
        }
    }

    private function startUserSession(UserModel $user): void
    {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
    }

    private function showLoginForm()
    {
        $view = new View();
        $view->render('login', [
            'title' => 'Login',
            'errors' => $this->errors,
            'hasErrors' => $this->hasErrors()
        ]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}



