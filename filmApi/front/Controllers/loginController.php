<?php
session_start();

if(isset($_POST["mail"])&&isset($_POST["pass"])){
    $urlLog="http://localhost/iSanchez/filmApi/back/Controllers/loginController.php?mail=".$_POST["mail"]."&pass=".$_POST["pass"];
    $user=json_decode(file_get_contents($urlLog));
    if($user->idUser>0){
        $_SESSION["idUser"]=$user->idUser;
        $_SESSION["mail"]=$user->mail;
        $_SESSION["pass"]=$_POST["pass"];
        header("location: filmsController.php");
    }else{
        die("Error en el login");
    }
}else{
    require_once "../Views/loginView.php";
}
