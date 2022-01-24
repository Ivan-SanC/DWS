<?php

include_once "../Models/loginModel.php";
session_start();
$_SESSION["login"]=false;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_POST["username"], $_POST["password"]);


    if ($user->getIdUser() > 0) {
        $_SESSION["userId"] = $user->getIdUser();
        $_SESSION["userName"] = $user->getNameUser();
        header("Location: list.php");


    } else {
        if (isset($_POST["username"])) {
           if($_POST["username"]!=$user->getNameUser()) {
               header("Location: login.php?errorCode=1");
           }elseif($_POST["username"]==$user->getNameUser() && $_POST["password"]!=$user->getPassUser()){
               header("Location:login.php?errorCode=2");
           }
        }
    }

} else {
    include_once "../Views/loginView.php";
}
