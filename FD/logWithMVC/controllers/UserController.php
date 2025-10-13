<?php
require_once '../models/userModel.php';
session_start();

/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';
exit;*/


class UserController {

    // 🔹 Afficher la page profil utilisateur
    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../views/loginView.php');
            exit;
        }

        $user = User::getById($_SESSION['user_id']);
        require '../views/userView.php';
    }

    //  Gérer l’upload d’une photo de profil
    public function uploadProfilePicture() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../views/loginView.php');
            exit;
        }

        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../public/uploads/';
            // Créer le dossier s’il n’existe pas
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['profile_picture']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
                User::updateProfilePicture($_SESSION['user_id'], $fileName);
            }
        }

        header('Location: ../controllers/UserController.php?action=profile');
        exit;
    }
}

// ===============================
// 🔹 ROUTEUR SIMPLE
// ===============================
$controller = new UserController();

if (isset($_GET['action']) && $_GET['action'] === 'uploadProfilePicture') {
    $controller->uploadProfilePicture();
} else {
    $controller->profile();
}


