<?php
require_once "../Models/singleModel.php";

session_start();

$model= new singleModel();

if(isset($_GET["id"])){
    $hotel=$model->getHotel($_GET["id"]);
}else{
    die(header("Location: list.php"));
}


require_once "../Views/singleHotelView.php";
