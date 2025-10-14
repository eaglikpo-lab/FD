<?php
require_once __DIR__ . '/../models/UserModelc.php';

class SignupController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Point d’entrée du contrôleur : gère la logique du formulaire
     */
    public function handleRequest()
    {
       try {
            /*echo "<p>Controller chargé</p>";
            var_dump($_SERVER["REQUEST_METHOD"]);*/

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $this->registerUser();
            } else {
                $this->showSignupForm();
            }
        } catch (Exception $e) {
            // ⚠️ Erreur globale non prévue
            $error = "Une erreur inattendue est survenue : " . $e->getMessage();
            error_log("Erreur signup : " . $e->getMessage());

            include __DIR__ . '/../views/signupView.php';
        }
    }

     

    /**
     * Enregistre un nouvel utilisateur
     */
    private function registerUser()
    {

        try {
            /*echo "<pre>POST reçu : "; print_r($_POST); echo "</pre>";
            exit;*/

            $name = htmlspecialchars(trim($_POST["name"] ?? ''));
            $email = htmlspecialchars(trim($_POST["email"] ?? ''));
            $password = $_POST["password"] ?? '';

            if (empty($name) || empty($email) || empty($password)) {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            // Ajout utilisateur
            $success = $this->userModel->addUser($name, $email, $password);

            if ($success) {
                header("Location: ../controllers/LoginControllerc.php?signup=success");     // Rediriger vers le login en cas de succès
                exit;
            } else {
                throw new Exception("Erreur lors de la création du compte. Veuillez réessayer.");
            }

        } catch (PDOException $e) {     //  Erreur de base de données
            $error = "Erreur base de données : " . $e->getMessage();
            include __DIR__ . '/../views/signupView.php';

        } catch (Exception $e) {    //  Autre erreur fonctionnelle
            $error = $e->getMessage();
            include __DIR__ . '/../views/signupView.php';
        }
    }

    /**
     * Afficher le formulaire d'inscription
     */
    private function showSignupForm()
    {
        include __DIR__ . '/../views/signupView.php';
    }
}

// --- Exécution du contrôleur ---
$controller = new SignupController();
$controller->handleRequest();

