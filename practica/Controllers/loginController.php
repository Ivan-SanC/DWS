<?php

use Models\loginModel;

require_once "../Models/loginModel.php";
session_start();

if(isset($_POST["mail"])){
    $lmodel= new loginModel();
    $user=$lmodel->getUser($_POST["mail"],$_POST["password"]);
    if($user->getId()>0){
        $_SESSION["id"]=$user->getId();
        $_SESSION["mail"]=$user->getMail();

        //die("inicio");
        header("Location: countriesListController.php");
    }else{
        if(isset($_POST["mail"])){
            if($_POST["password"]!=$user->getPassword()){
                die("Error de pass");
            }else{
                die("Error de user");
            }
        }
    }
}else{
    require_once "../Views/loginView.php";
}
