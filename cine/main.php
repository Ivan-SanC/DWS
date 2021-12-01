<?php
include_once "author.php";
include_once "genre.php";
include_once "movie.php";
include_once "dbo.php";

$dbo= new dbo();
$movies= $dbo->getMovies();
var_dump($movies);