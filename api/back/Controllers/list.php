<?php
require_once "../Models/listModel.php";

$model=new listModel();
$hotels= $model->getHotels();

$api=json_encode($hotels);

var_dump(json_decode($api));


