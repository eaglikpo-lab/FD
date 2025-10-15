<?php
session_start();
require_once __DIR__ . '/../models/UserModelc.php';

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Point d’entrée du contrôleur
     */
    public function handleRequest()
    {
        /*echo "<p>Controller chargé</p>";
        var_dump($_SERVER["REQUEST_METHOD"]);*/

        try {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $this->loginUser();
            } else {
                $this->showLoginForm();
            }
        } catch (Exception $e) {        // Erreur globale non prévue
            $errorMessage = "Une erreur inattendue est survenue : " . $e->getMessage();
            include __DIR__ . '/../views/loginView.php';
        }
    }

    /**
     * Gérer la tentative de connexion
     */
    private function loginUser()
    {/*
        $email = trim($_POST["email"] ?? '');
        $password = $_POST["password"] ?? '';

        // Validation de base
        if (empty($email) || empty($password)) {
            $error = "Veuillez remplir tous les champs.";
            include __DIR__ . '/../views/loginView.php';
            return;
        }

        // Récupérer l'utilisateur par e-mail
        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user["password"])) {
            // Connexion réussie : on sauvegarde les infos dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'];

            // Redirection vers la page utilisateur
            header("Location: ../controllers/UserController.php");
            exit;
        } else {
            $errorMessage = "Adresse email ou mot de passe incorrect.";
            include __DIR__ . '/../views/loginView.php';
        }*/


        try {
            $email = trim($_POST["email"] ?? '');
            $password = $_POST["password"] ?? '';
            //var_dump($email,$password);

            // Validation de base
            if (empty($email) || empty($password)) {
                throw new Exception("Veuillez remplir tous les champs!");
            }

            // Récupérer l'utilisateur
            $user = $this->userModel->getUserByEmail($email);

            if (!$user) {
                throw new Exception("Invalid email.");
            }

            if (!password_verify($password, $user["password"])) {
                throw new Exception("Incorrect mail address or password.");
            }

            if ($user && password_verify($password, $user["password"])) {
            // ✅ Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'];

            header("Location: ../controllers/UserControllerc.php");
            exit;}

        } catch (PDOException $e) {
            // ⚠️ Erreur de base de données
            $errorMessage = "Erreur de base de données : " . $e->getMessage();
            error_log("Erreur PDO (login) : " . $e->getMessage());
            include __DIR__ . '/../views/loginView.php';

        } catch (Exception $e) {
            // ⚠️ Erreur fonctionnelle (mot de passe, email, etc.)
            $errorMessage = $e->getMessage();
            include __DIR__ . '/../views/loginView.php';
        }
    }

    /**
     * Afficher le formulaire de connexion
     */
    private function showLoginForm()
    {
        $successMessage = "";
        if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
            $successMessage = "Inscription réussie ! Connectez-vous.";
           // var_dump($successMessage);
        }

        include __DIR__ . '/../views/loginView.php';
    }
}

// --- Exécution du contrôleur ---
$controller = new LoginController();
$controller->handleRequest();
?>
