<?php

class LoginController
{
    private $email;
    private $password;
    private $errors = [];

    // Getters et Setters
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

    public function login()
    {
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

        // Si on arrive ici, il y a eu des erreurs
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

    public function showLoginForm()
    {
        // Inclure la vue du formulaire de connexion
        include 'views/login.php';
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


