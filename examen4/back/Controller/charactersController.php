<?php
include_once "../Model/characterModel.php";
include_once "../Model/loginModel.php";


$user = new user(0, "-", "-");
if (isset($_GET["mail"]) && isset($_GET["pass"])) {
    $loginModel = new loginModel();
    $user = $loginModel->getUser($_GET["mail"], $_GET["pass"]);

}

$chModel = new characterModel();
$list = $chModel->getCharacters();


if ($user->getIdUser() > 0) {
    $select = $chModel->allLocation();
    if (isset($_GET["action"]) && isset($_GET["idCharacter"]) && isset($_GET["idLocation"])) {
        if ($_GET["action"] == "change") {
            $chModel->changeLocation($_GET["idLocation"], $_GET["idCharacter"]);
        }
    }
    $list = $chModel->getCharacters();

    $return = array(
        "list" => $list,
        "select" => $select
    );

    echo json_encode($return);

} else {
    $return = array("list" => $list);
    echo json_encode($return);
}

//si esta login muestra columna de cambiar location