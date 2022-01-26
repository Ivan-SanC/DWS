<?php
require_once "../Models/countriesListModel.php";
session_start();

if (isset($_SESSION["id"])) {
    $cmodel = new countriesListModel();
    $myCountries = $cmodel->getMyCountries($_SESSION["id"]);
    $otherCountries = $cmodel->getOtherCountries($_SESSION["id"]);

    if (isset($_GET["action"]) && isset($_GET["countryCode"])) {
        $myAttack = $cmodel->getMyAttack($_SESSION["id"]);
        $otherAttack = $cmodel->getOtherAttack($_GET["countryCode"]);

        if ($myAttack > $otherAttack) {
            $cmodel->updateUser($_GET["countryCode"], $_SESSION["id"]);
            header("Location: countriesListController.php");
        }
    }

    require_once "../Views/countriesListView.php";
} else {
    header("Location: loginController.php");
}