<?php
require_once __DIR__ . '/../db.php';

class UserModel
{
    private $pdo;

    public function __construct()
    {
        // On utilise la connexion PDO définie dans db.php
        global $pdo;
        $this->pdo = $pdo;
    }

    /**
     * Ajouter un utilisateur
     */
    public function addUser($name, $email, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$name, $email, $hashedPassword]);
    }

    /**
     * Récupérer un utilisateur par son email
     */
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer un utilisateur par son ID
     */
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour la photo de profil
     */
    public function updateProfilePicture($id, $fileName)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
        return $stmt->execute([$fileName, $id]);
    }
}
?>
