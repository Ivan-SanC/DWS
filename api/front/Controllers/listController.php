<?php
$url="http://localhost/iSanchez/api/back/Controllers/listController.php";

$hotels=json_decode(file_get_contents($url),true);
session_start();


/*
echo "<pre>";
var_dump($hotels);
*/

require_once "../Views/listView.php";