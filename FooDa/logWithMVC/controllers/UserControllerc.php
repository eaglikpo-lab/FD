<?php
require_once __DIR__ . '/../models/UserModelc.php';
session_start();

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel(); //  instanciation du modèle
    }

    /**
     * 🔹 Affiche la page de profil utilisateur
     */
    public function profile() {
        try {
            if (!isset($_SESSION['user_id'])) {
                header('Location: ../controllers/LoginControllerc.php');
                exit;
            }

            $user = $this->userModel->getById($_SESSION['user_id']);
            require __DIR__ . '/../views/userView.php';
        } catch(Exception $e) {
            // ⚠️ Erreur globale non prévue
            $error = "Une erreur inattendue est survenue : " . $e->getMessage();
            error_log("Erreur signup : " . $e->getMessage());

            include __DIR__ . '../controllers/LoginControllerc.php';
        }
    }

    /**
     * 🔹 Gère l’upload d’une photo de profil
     */
    public function uploadProfilePicture() {
        try {
            if (!isset($_SESSION['user_id'])) {
                header('Location: ../controllers/LoginControllerc.php');
                exit;
            }

            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../public/uploads/';

                // Créer le dossier s’il n’existe pas
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = uniqid() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
                    $this->userModel->updateProfilePicture($_SESSION['user_id'], $fileName); // ✅ appel objet
                }
            }

            header('Location: ../controllers/UserControllerc.php?action=profile');
            exit;
        } catch(Exception $e) {
            // ⚠️ Erreur globale non prévue
            $error = "Une erreur inattendue est survenue : " . $e->getMessage();
            error_log("Erreur signup : " . $e->getMessage());

            include __DIR__ . '/../views/userView.php';
        }
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
