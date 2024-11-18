<?php

namespace App\Models;

use App\Database\Database;


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
    try {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $result = $stmt->execute([$this->username, $this->email, $this->password]);
        if (!$result) {
            error_log("Erreur SQL : " . implode(", ", $stmt->errorInfo()));
        }
        return $result;
    } catch (\PDOException $e) {
        error_log("Erreur PDO : " . $e->getMessage());
        return false;
    }
}

public static function findByUsername($username)
{
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if ($userData) {
        $user = new self();
        $user->setId($userData['id']);
        $user->setUsername($userData['username']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        return $user;
    }
    
    return null;
}


public static function findByEmail($email)
{
    error_log("UserModel::findByEmail() appelée avec email: " . $email);
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userData = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($userData) {
        error_log("Utilisateur trouvé dans la base de données");
        $user = new self();
        $user->setId($userData['id']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        // Assurez-vous de définir tous les autres champs nécessaires
        return $user;
    }

    error_log("Aucun utilisateur trouvé avec cet email");
    return null;
}



private static function createFromArray(?array $userData): ?UserModel
{
    if (!$userData) {
        return null;
    }

    $user = new UserModel();
    $user->setId($userData['id'] ?? null);
    $user->setUsername($userData['username'] ?? '');
    $user->setEmail($userData['email'] ?? '');
    $user->setPassword($userData['password'] ?? '');
    return $user;
}
public function getFavorites($userId)
{
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM favorites WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

public function addFavorite($userId, $itemId, $itemType, $itemData)
{
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("INSERT INTO favorites (user_id, item_id, item_type, item_data) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$userId, $itemId, $itemType, json_encode($itemData)]);
}

public function removeFavorite($userId, $itemId, $itemType)
{
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("DELETE FROM favorites WHERE user_id = ? AND item_id = ? AND item_type = ?");
    return $stmt->execute([$userId, $itemId, $itemType]);
}
public static function findById($id): ?UserModel
{
    try {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($userData) {
            $user = new UserModel();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            // Ne pas définir le mot de passe ici pour des raisons de sécurité
            return $user;
        }
        
        return null;
    } catch (\PDOException $e) {
        error_log("Error finding user by ID: " . $e->getMessage());
        return null;
    }
}

}