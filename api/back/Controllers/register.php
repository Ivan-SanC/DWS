<?php
require_once "../Models/registerModel.php";

$return = array();
$result =new user(0,"-","-","-");
$error = "";


if (isset($_GET["name"])&&isset($_GET["pass"])){
    $register= new registerModel();

    if($register->checkUser($_GET["mail"],$_GET["name"])){
        $error=1;
    } else {
        try {
            $password = crypt($_GET["pass"], bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $password = crypt($_GET["pass"], "salt");
        }
        if ($register->insertUser($_GET["mail"],$_GET["name"], $password)) {
            $result = $register->getUser($_GET["name"],$_GET["pass"]);
        } else {
            $error =2;
        }
    }
} else {
    $error =3;
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);