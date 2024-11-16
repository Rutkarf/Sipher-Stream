<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;


class RegisterController
{
    private $username;
    private $email;
    private $password;
    private $confirmPassword;
    private $errors = [];




    public function index()
    {
        $view = new View();
        $view->render('register', [
            'title' => 'Register',
            'errors' => $this->errors,
            'hasErrors' => $this->hasErrors()
        ]);
    }
    









    // Getters et Setters
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }

    public function register()
    {
        if ($this->validateInputs()) {
            $user = new UserModel();
            $user->setUsername($this->username);
            $user->setEmail($this->email);
            $user->setPassword(password_hash($this->password, PASSWORD_DEFAULT));

            if ($user->save()) {
                // Redirection vers la page de connexion ou le tableau de bord
                header('Location: /login');
                exit;
            } else {
                $this->errors[] = "Erreur lors de l'enregistrement de l'utilisateur.";
            }
        }

        // Si on arrive ici, il y a eu des erreurs
        // Afficher la vue d'inscription avec les erreurs
        $this->showRegisterForm();
    }

    private function validateInputs(): bool
    {
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();

        return empty($this->errors);
    }

    private function validateUsername(): void
    {
        if (empty($this->username)) {
            $this->errors[] = "Le nom d'utilisateur est requis.";
        } elseif (strlen($this->username) < 3 || strlen($this->username) > 50) {
            $this->errors[] = "Le nom d'utilisateur doit contenir entre 3 et 50 caractères.";
        } elseif (UserModel::findByUsername($this->username)) {
            $this->errors[] = "Ce nom d'utilisateur est déjà pris.";
        }
    }

    private function validateEmail(): void
    {
        if (empty($this->email)) {
            $this->errors[] = "L'adresse email est requise.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "L'adresse email n'est pas valide.";
        } elseif (UserModel::findByEmail($this->email)) {
            $this->errors[] = "Cette adresse email est déjà utilisée.";
        }
    }

    private function validatePassword(): void
    {
        if (empty($this->password)) {
            $this->errors[] = "Le mot de passe est requis.";
        } elseif (strlen($this->password) < 8) {
            $this->errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        } elseif ($this->password !== $this->confirmPassword) {
            $this->errors[] = "Les mots de passe ne correspondent pas.";
        }
    }

    public function showRegisterForm()
    {
        // Inclure la vue du formulaire d'inscription
        include 'views/register.php';
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