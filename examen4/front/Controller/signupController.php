<?php
session_start();

if (isset($_POST["mail"]) && isset($_POST["pass"]) && isset($_POST["pass2"])) {
    if ($_POST["pass"] == $_POST["pass2"]) {
        $urlSign="http://localhost/iSanchez/examen4/back/Controller/signupController.php?mail=".$_POST["mail"]."&pass=".$_POST["pass"];
        $sign=json_decode(file_get_contents( $urlSign));
        if ($sign->result) {
            header("Location: loginController.php");
        } else {
            die($sign->error);
        }
    }
} else {
    require_once "../View/signupView.php";
}