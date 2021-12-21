<?php
include_once "dbo.php";

session_start();
$dbo = new dbo();

// recibe los comentarios se ejecuta dbo y redirige a la pagina otra vez
//con esto evitamos que el post se quede registrado en la pagina de la pelicula y asi cuando recargamos pagina
//no manda otra vez el mismo formulario y los comentarios aparecen al instante
if (isset($_POST["like"])) {
    $dbo->insertLike($_SESSION["userId"], $_SESSION["movie"]);
    header('Location:details.php?id=' . $_SESSION["movie"]);
}

if (isset($_POST["comentario"])) {
    $userId = $_SESSION["userId"];
    $comment = $_POST["comentario"];
    $dbo->insertComments($userId, $_SESSION["movie"], $comment);

    header('Location:details.php?id=' . $_SESSION["movie"]);
}