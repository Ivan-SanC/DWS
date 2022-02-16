<?php
session_start();

if(!isset($_SESSION["idUser"])){
    $url = "http://localhost/iSanchez/examen4/back/Controller/charactersController.php?";
    $list = json_decode(file_get_contents($url));
    $characters = $list->list;
}else{
    $url = "http://localhost/iSanchez/examen4/back/Controller/charactersController.php?mail=".$_SESSION["mail"]."&pass=".$_SESSION["pass"];
    $list = json_decode(file_get_contents($url));
    $characters = $list->list;
    $locations=$list->select;
    if(isset($_POST["location"])){
        $idlocation=$_POST["location"] ?? "";
        $idCharacter=$_POST["idCharacter"] ?? "";
        $url = "http://localhost/iSanchez/examen4/back/Controller/charactersController.php?mail="
            .$_SESSION["mail"]."&pass=".$_SESSION["pass"]."&idLocation=".$_POST["location"]."&idCharacter=".$_POST["idCharacter"]."&action=change";
        $list = json_decode(file_get_contents($url));
        $characters = $list->list;
    }

}

require_once "../View/characterView.php";