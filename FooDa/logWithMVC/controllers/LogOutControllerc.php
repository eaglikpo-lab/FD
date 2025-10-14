<?php
session_start();

class LogoutController
{
    public function handleLogout()
    {
        // ✅ Détruire la session de manière sécurisée
        $_SESSION = [];  // Vider le tableau de session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy(); // 🔥 Fin de session complète

        // ✅ Redirection vers la page de connexion
        header("Location: ../controllers/LoginControllerc.php");
        exit;
    }
}

// --- Exécution du contrôleur ---
$controller = new LogoutController();
$controller->handleLogout();
?>
