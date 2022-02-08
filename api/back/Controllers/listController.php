<?php
require_once "../Models/listModel.php";

$listModel = new listModel();
$hotels = $listModel->getHotels();

echo json_encode($hotels);


/*
 * pasar el mail y la pass por get
 *
echo "<pre>";
var_dump($api);
*/