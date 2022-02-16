<?php

include_once "../Model/signupModel.php";

$return = array();
$result = false;
$error = "";

if (isset($_GET["mail"]) && isset($_GET["pass"])) {
    $signupModel = new signupModel();

    if ($signupModel->checkUser($_GET["mail"])) {
        $error = "Email en uso";

    } else {

        try {
            $password = crypt($_GET["pass"], bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $password = crypt($_GET["pass"], "salt");
        }
        if ($signupModel->insertUser($_GET["mail"], $password)) {
            $result = true;
        } else {
            $error = "Algo fallo";
        }
    }
} else {
    $error = "Algo fallo";
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);