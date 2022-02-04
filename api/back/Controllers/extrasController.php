<?php
include_once "../Models/extrasModel.php";
session_start();
$eModel=new extrasModel();

if (isset($_POST["comentario"])) {
    $userId = $_SESSION["userId"];
    $comment = $_POST["comentario"];
    $eModel->insertComments($_SESSION["idHotel"],$userId , $comment);

    header('Location:singleHotel.php?id=' . $_SESSION["idHotel"]);
}