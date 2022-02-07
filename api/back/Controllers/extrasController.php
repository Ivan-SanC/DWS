<?php
require_once "../Models/extrasModel.php";

$extras=new extrasModel();

$comments=$extras->getComments($_GET["id"]);

$api=json_encode($comments);
echo $api;