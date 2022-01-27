<?php
require_once "../Models/singleModel.php";

session_start();

$model= new singleModel();

if(isset($_GET["id"])){
    $hotel=$model->getHotel($_GET["id"]);
    if(isset($_POST["check-in"])&&isset($_POST["check-out"])){
        $in=$_POST["check-in"];
        $out=$_POST["check-out"];
    }

}else{
    die(header("Location: list.php"));
}


require_once "../Views/singleHotelView.php";