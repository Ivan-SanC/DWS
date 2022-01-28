<?php
require_once "../Models/singleModel.php";
session_start();


$model= new singleModel();
$errorCode = "";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}

if(isset($_GET["id"])){
    $hotel=$model->getHotel($_GET["id"]);
    if(isset($_POST["check-in"])&&isset($_POST["check-out"])){
        $start=$_POST["check-in"];
        $end=$_POST["check-out"];
        if($start>=$end){
            header("Location: singleHotel.php?errorCode=1");
        }

    }

}else{
    header("Location: list.php");
}


require_once "../Views/singleHotelView.php";