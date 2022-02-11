<?php
require_once "../Models/loginModel.php";

$return=array();

//get de user y pass
if (isset($_GET["name"]) && isset($_GET["pass"])) {
    $login = new loginModel();

    $user = $login->getUser($_GET["name"], $_GET["pass"]);

    if ($user->getIdUser() > 0) {
        $return["user"]=$user;

    } else {
        $return["user"]=new user(0,"-","-","-");
        if (isset($_GET["name"])) {

            if($_GET["pass"]!=$user->getPassUser()) {
                $return["error"]=1;

            }else{
                $return["error"]=2;
            }
        }
    }
}
echo json_encode($return);