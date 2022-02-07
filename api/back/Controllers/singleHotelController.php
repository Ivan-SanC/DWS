<?php
require_once "../Models/singleHotelModel.php";


$single=new singleHotelModel();
$hotel=$single->getHotel($_GET["id"]);



$api=json_encode($hotel);
echo $api;