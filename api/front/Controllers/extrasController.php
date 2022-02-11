<?php
session_start();

if (isset($_POST["comentario"])) {
    $url="http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=".$_SESSION["idHotel"]."&userId=".$_SESSION["userId"]."&comment=".$_POST["comentario"];

    header('Location:singleHotelController.php?id='.$_SESSION["idHotel"]);
}