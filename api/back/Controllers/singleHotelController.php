<?php
require_once "../Models/singleHotelModel.php";


$single = new singleHotelModel();
$extras= new  extrasModel();

if (isset($_GET["id"])) {
    $hotel = $single->getHotel($_GET["id"]);
} else {
    $hotel = "NO ID SELECTED";
}

echo json_encode($hotel);
