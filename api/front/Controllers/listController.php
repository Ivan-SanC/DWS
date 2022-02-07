<?php
$url="http://localhost/dws/apis/back/Controllers/listController.php";

$hotels=json_decode(file_get_contents($url),true);

/*
echo "<pre>";
var_dump($hotels);
*/

require_once "../Views/listView.php";