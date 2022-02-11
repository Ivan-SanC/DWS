<?php
require_once "../Models/extrasModel.php";

$extras = new extrasModel();


if (isset($_GET["id"])) {

    if (isset($_GET["userId"])){
        $extras->insertComments($_GET["id"],$_GET["userId"],$_GET["comment"]);
    }
    $comments = $extras->getComments($_GET["id"]);
} else {
    $comments = "ID NO SELECTED";
}
echo json_encode($comments);

//http://localhost/iSanchez/api/back/Controllers/extrasController.php?id=1&userId=1&comment=hola