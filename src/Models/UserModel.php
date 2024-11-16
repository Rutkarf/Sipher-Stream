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

public static function findByUsername($username): ?UserModel
{
    try {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        // Si aucun utilisateur n'est trouvé, $userData sera false
        return $userData ? self::createFromArray($userData) : null;
    } catch (\PDOException $e) {
        error_log("Error finding user by username: " . $e->getMessage());
        return null;
    }
}


public static function findByEmail($email): ?UserModel
{
    try {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $userData ? self::createFromArray($userData) : null;
    } catch (\PDOException $e) {
        error_log("Error finding user by email: " . $e->getMessage());
        return null;
    }
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
   
}