<?php
include_once "author.php";
include_once "genre.php";
include_once "movie.php";
include_once "dbo.php";

$dbo= new dbo();
$movies= $dbo->getMovies();
$movie1= $dbo->getMovie(1);

//sorting rating , director, year, duration, generos;
//buscador
//pinchar en imagen enlazar con pagina descripcion

?>
<html>
<head>
    <style>
        h1{
            text-align: center;
        }


    </style>
    <title>Peliteca</title>
</head>
<body>
<h1>Peliteca</h1>


</body>
</html>