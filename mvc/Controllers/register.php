<?php
require_once "../Models/registerModel.php";
require_once "../Entities/user.php";
session_start();

$errorCode = "";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}

if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $signupModel = new registerModel();

    if ($signupModel->checkUser($_POST["email"], $_POST["username"]) == $_POST["email"]) {
        header("Location: register.php?errorCode=1");

    } else if ($signupModel->checkUser($_POST["email"], $_POST["username"]) == $_POST["username"]) {
        header("Location: register.php?errorCode=2");;

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
            header("Location: register.php?errorCode=3");
        }
    }
} else {
    require_once "../Views/registerView.php";
}