<?php

include_once "../Models/loginModel.php";
session_start();
$_SESSION["login"]=true;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_POST["username"], $_POST["password"]);


    if ($user->getIdUser() > 0) {
        $_SESSION["userId"] = $user->getIdUser();
        $_SESSION["userName"] = $user->getNameUser();
        header("Location: list.php");


    } else {
        if (isset($_POST["username"])) {
            $_SESSION["login"]=true;
            header("Location: login.php");
        }
    }

} else {
    include_once "../Views/loginView.php";
}
