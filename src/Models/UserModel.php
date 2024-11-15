<?php

class UserModel
{
    private $id;
    private $username;
    private $email;
    private $password;

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

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

    public function save(): bool
    {
        // Logique pour sauvegarder l'utilisateur dans la base de données
        // Exemple simplifié (à adapter selon votre système de base de données) :
        $db = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "utilisateur", "mot_de_passe");
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$this->username, $this->email, $this->password]);
    }

    public static function findByUsername($username): ?UserModel
    {
        // Logique pour trouver un utilisateur par son nom d'utilisateur
        $db = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "utilisateur", "mot_de_passe");
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($userData) {
            $user = new UserModel();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            return $user;
        }
        
        return null;
    }

    public static function findByEmail($email): ?UserModel
    {
        // Logique pour trouver un utilisateur par son email
        $db = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "utilisateur", "mot_de_passe");
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($userData) {
            $user = new UserModel();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            return $user;
        }
        
        return null;
    }
}