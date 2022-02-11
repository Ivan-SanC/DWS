<?php
session_start();
$errorCode="";

if(isset($_GET["errorCode"])){
    $errorCode=$_GET["errorCode"];
}

if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $url="http://localhost/iSanchez/api/back/Controllers/registerController.php?mail=".$_POST["email"]."&name=".$_POST["username"]."&pass=".$_POST["password"];
    $user=json_decode(file_get_contents($url))->result;

    if($user->idUser>0){
        $_SESSION["userId"] = $user->idUser;
        $_SESSION["userName"] = $user->nameUser;
        header("Location: listController.php");


    }else{
        $errorCode=json_decode(file_get_contents($url))->error;

        header("Location: registerController.php?errorCode=".$errorCode);
    }

}else{
    require_once "../Views/registerView.php";
}