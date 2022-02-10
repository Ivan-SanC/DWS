<?php
require_once "../Models/loginModel.php";

//get de user y pass
if (isset($_GET["name"]) && isset($_GET["pass"])) {
    $login = new loginModel();
    $user = $login->getUser($_GET["name"], $_GET["pass"]);
    echo json_encode($user);
} else {
    echo json_encode(new user(0, "-", "-","-"));
}