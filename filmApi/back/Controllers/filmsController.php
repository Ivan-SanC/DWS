<?php
require_once "../Models/filmModel.php";
require_once "../Models/loginModel.php";


$user=new user(0,"-","-");

if(isset($_GET["mail"])&&isset($_GET["pass"])){
    $login=new loginModel();
    $user=$login->getUser($_GET["mail"],$_GET["pass"]);
    $idUser=$user->getIdUser();
}

$model = new filmModel();
$otherFilms = $model->getOtherFilms();

if ($idUser> 0) {
    if(isset($_GET["action"])&&isset($_GET["idFilm"])){
        if($_GET["action"]=="rent"){
            $model->rentFilm($idUser,$_GET["idFilm"]);
        }else if($_GET["action"]=="return"){
            $model->returnFilm($idUser,$_GET["idFilm"]);
        }
    }
    $myFilms = $model->getMyFilms($idUser);

    $return=array(
        "myFilms"=>$myFilms,
        "otherFilms"=>$otherFilms
    );

    echo json_encode($return);

}else{
    $return=array(
        "otherFilms"=>$otherFilms
    );
    echo json_encode($return);
}