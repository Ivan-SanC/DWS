<?php
require_once "../Models/signupModel.php";
session_start();

if (isset($_POST["mail"])) {
    if ($_POST["password"] == $_POST["password2"]) {
        $smodel = new signupModel();
        if ($smodel->checkUser($_POST["mail"])) {
            die("usuario existe");
        } else {
            try {
                $password = crypt($_POST["password"], bin2hex(random_bytes(10)));

            } catch (Exception $e) {
                $password = crypt($_POST["password"], "salt");
            }
            if ($smodel->insertUser($_POST["mail"], $password)) {
                $user = $smodel->getUser($_POST["mail"], $_POST["password"]);
                $_SESSION["mail"] = $user->getMail();
                $_SESSION["id"] = $user->getId();
                $randomCode = $smodel->randomCode();
                $smodel->randomUser($randomCode, $_SESSION["id"]);

                header("Location: countriesListController.php");
            } else {
                die("algo fallo");
            }
        }
    }else{
        die("Las passwords no coinciden");
    }
} else {
    require_once "../Views/signUpView.php";
}