<?php
$url="http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=";
$urlEx="http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=";

$hotel=json_decode(file_get_contents($url.$_GET["id"]),true);
$comments=json_decode(file_get_contents($urlEx.$_GET["id"]),true);
$errorCode="";
require_once "../Views/singleHotelView.php";