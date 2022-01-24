
<?php

include_once "../Models/registerModel.php";

session_start();
//error en registro.
if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {

        $signupModel = new registerModel();
        if ($signupModel->checkUser($_POST["email"],$_POST["username"])) {
            die("User already exists");
        } else {
            try {
                $password = crypt($_POST["password"], bin2hex(random_bytes(10)));
            } catch (Exception $e) {
                $password = crypt($_POST["password"], "salt");
            }
            if ($signupModel->insertUser($_POST["email"],$_POST["username"],$password)) {
                $user=$signupModel->getUser($_POST["username"], $_POST["password"]);
                $_SESSION["userId"] = $user->getIdUser();
                $_SESSION["userName"] = $user->getNameUser();
                header("Location: list.php");
            } else {
                die("sign up gone wrong");
            }
        }
} else {
    include_once "../Views/registerView.php";
}