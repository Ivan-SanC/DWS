<?php
require_once "../Models/extrasModel.php";

$extras = new extrasModel();
if (isset($_GET["id"])) {
    $comments = $extras->getComments($_GET["id"]);
} else {
    $comments = "ID NO SELECTED";
}
echo json_encode($comments);
