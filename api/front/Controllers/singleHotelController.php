<?php
$url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=";
$urlEx="http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=";
//no actualiza comments ni mete

session_start();
$errorCode="";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}


if(isset($_GET["id"])){
    $hotel=json_decode(file_get_contents($url.$_GET["id"]))->hotel;
    $comments=json_decode(file_get_contents($urlEx.$_GET["id"]), true);
    $_SESSION["idHotel"]=$_GET["id"];


    if (isset($_POST["check-in"])&&isset($_POST["check-out"])){
        $url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=".$_SESSION["idHotel"]."&start=".$_POST["check-in"]."&end=".$_POST["check-out"]."&idUser=". $_SESSION["userId"];
    }
    $errorCode=json_decode(file_get_contents($url.$_GET["id"]))->error;
    //var_dump($errorCode);
    if($errorCode!="") {
        header("Location: singleHotelController.php?id=".$_SESSION["idHotel"]."&errorCode=".$errorCode);
    }

}else{
    die("ID NO SELECTED");
}

require_once "../Views/singleHotelView.php";

//fallan alerts y reservas comentarios igual