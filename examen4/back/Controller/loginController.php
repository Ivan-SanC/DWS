<?php
include_once "../Model/loginModel.php";

if (isset($_GET["mail"]) && isset($_GET["pass"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_GET["mail"], $_GET["pass"]);
    echo json_encode($user);
} else {
    echo json_encode(new user(0, "-", "-"));
}