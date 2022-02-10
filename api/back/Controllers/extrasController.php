<?php
require_once "../Models/extrasModel.php";

$extras = new extrasModel();
if (isset($_GET["id"])) {
    $comments = $extras->getComments($_GET["id"]);
    if(isset($_GET["comments"])){
        $extras->insertComments($_GET["id"],$_GET["idUser"],$_GET["comments"]);
    }
} else {
    $comments = "ID NO SELECTED";
}
echo json_encode($comments);
