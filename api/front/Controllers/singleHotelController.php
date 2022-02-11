<?php
$url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=";
$urlEx="http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=";

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
        //Fecha como segundos
        $tiempoInicio = strtotime($_POST["check-in"]);
        $tiempoFin = strtotime($_POST["check-out"]);

        $url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=".$_SESSION["idHotel"]."&start=".$tiempoInicio."&end=".$tiempoFin."&userId=". $_SESSION["userId"];
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

//Los alert no se muestran en la web y no se insertan las reservas en la base de datos