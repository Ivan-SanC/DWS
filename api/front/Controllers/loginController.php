<?php
session_start();
$errorCode="";

if(isset($_GET["errorCode"])){
    $errorCode=$_GET["errorCode"];
}


if (isset($_POST["username"]) && isset($_POST["password"])) {
    $url="http://localhost/iSanchez/api/back/Controllers/loginController.php?name=".$_POST["username"]."&pass=".$_POST["password"];
    $user=json_decode(file_get_contents($url))->user;

    if ($user->idUser>0) {
        $_SESSION["userId"] = $user->idUser;
        $_SESSION["userName"] = $user->nameUser;
        header("Location: listController.php");


    }else {
        $errorCode=json_decode(file_get_contents($url))->error;
        header("Location: loginController.php?errorCode=".$errorCode);
    }

} else {
    include_once "../Views/loginView.php";
}
