<?php
require_once "../Models/loginModel.php";

if (isset($_GET["mail"])&&isset($_GET["pass"])){
    $login=new loginModel();
    $user= $login->getUser($_GET["mail"],$_GET["pass"]);
    echo json_encode($user);
}else{
    $user=new user(0,"-","-");
    echo json_encode($user);
}