<?php
require_once __DIR__ . '/../db.php';

function addUser($name, $email, $password) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
}

function getUserByEmail($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

//require_once '../config/database.php';

class User {
    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProfilePicture($id, $fileName) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
        $stmt->execute([$fileName, $id]);
    }
}

?>
