<?php

include_once "../Models/loginModel.php";
session_start();

$errorCode = "";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}


if (isset($_POST["username"]) && isset($_POST["password"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_POST["username"], $_POST["password"]);


    if ($user->getIdUser() > 0) {
        $_SESSION["userId"] = $user->getIdUser();
        $_SESSION["userName"] = $user->getNameUser();
        header("Location: list.php");


    } else {
        if (isset($_POST["username"])) {
            if ($_POST["password"] != $user->getPassUser()) {
                header("Location: login.php?errorCode=1");

            } else {
                header("Location:login.php?errorCode=2");
            }
        }
    }

} else {
    include_once "../Views/loginView.php";
}
