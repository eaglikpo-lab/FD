<?php
require_once __DIR__ . '/../models/UserModel.php'; // casse insignifiante

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    addUser($_POST["name"], $_POST["email"], $_POST["password"]);
    header("Location: ../controllers/LoginController.php");
    exit;
}

include __DIR__ . '/../views/signupView.php';
?>