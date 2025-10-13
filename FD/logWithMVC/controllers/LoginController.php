<?php
session_start();

require_once __DIR__ . '/../models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = getUserByEmail($_POST["email"]);
    print_r($user);

    var_dump($user);

    if ($user && password_verify($_POST["password"], $user["password"])) {

        $_SESSION['user_id'] = $user['id'];        // l'ID du user
        $_SESSION['username'] = $user['name']; // son nom
        $_SESSION['email'] = $user['email'];   
        $_SESSION['profile_picture'] = $user['profile_picture'];  

       /* $_SESSION["user"] = [
            "user_id" => $user["id"],
            "username" => $user["name"],
            "email" => $user["email"],
            "profile_picture" => $user["profile_picture"]
        ];*/

        echo "Login OK — redirection...";

        header("Location: ../controllers/UserController.php");
        exit;
    } else {
        $error = "Incorrect password or email address";
    }
}

include __DIR__ . '/../views/loginView.php';

