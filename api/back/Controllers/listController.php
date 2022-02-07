<?php
require_once "../Models/listModel.php";

$listModel = new listModel();
$hotels = $listModel->getHotels();

$api = json_encode($hotels);

echo $api;

/*
echo "<pre>";
var_dump($api);
*/