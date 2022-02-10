<?php
require_once "../Models/registerModel.php";

$return = array();
$result = false;
$error = "";


if (isset($_GET["name"])&&isset($_GET["pass"])){
    $register= new registerModel();
    if($register->checkUser($_GET["mail"],$_GET["name"])){
        $error="El usuario existe";
    } else {
        try {
            $password = crypt($_GET["password"], bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $password = crypt($_GET["password"], "salt");
        }
        if ($register->insertUser($_GET["mail"],$_GET["name"], $password)) {
            $result = true;
        } else {
            $error = "Sign up gone wrong";
        }
    }
} else {
    $error = "Sign up gone wrong";
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);