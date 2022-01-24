<?php
require_once "../Models/registerModel.php";
require_once "../Entities/user.php";
session_start();

if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $signupModel = new registerModel();

    if ($signupModel->checkUser($_POST["email"], $_POST["username"]) == $_POST["email"]) {
        $_SESSION["errorCheck"] = "El email ya existe.";

    } else if ($signupModel->checkUser($_POST["email"], $_POST["username"]) == $_POST["username"]) {
        $_SESSION["errorCheck"] = "El Nombre ya existe.";

    } else {
        try {
            $password = crypt($_POST["password"], bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $password = crypt($_POST["password"], "salt");
        }
        if ($signupModel->insertUser($_POST["email"], $_POST["username"], $password)) {
            $user = $signupModel->getUser($_POST["username"], $_POST["password"]);
            $_SESSION["userId"] = $user->getIdUser();
            $_SESSION["userName"] = $user->getNameUser();
            header("Location: list.php");
        } else {
            $_SESSION["errorCheck"] = "Algo falló en el registro.";
        }
    }
} else {
    require_once "../Views/registerView.php";
}