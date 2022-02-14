<?php
$url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=".$_GET["id"];
$urlEx="http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=".$_GET["id"];

session_start();
$errorCode="";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}


if(isset($_GET["id"])){
    $hotel=json_decode(file_get_contents($url))->hotel;
    $comments=json_decode(file_get_contents($urlEx), true);
    $_SESSION["idHotel"]=$_GET["id"];


    if (isset($_POST["check-in"])&&isset($_POST["check-out"])){

        $url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=".$_SESSION["idHotel"]."&start=".$_POST["check-in"]."&end=".$_POST["check-out"]."&userId=". $_SESSION["userId"];
        $errorCode=json_decode(file_get_contents($url))->error;
    }

}else{
    die("ID NO SELECTED");
}

require_once "../Views/singleHotelView.php";

//Los alert no se muestran en la web y no se insertan las reservas en la base de datos