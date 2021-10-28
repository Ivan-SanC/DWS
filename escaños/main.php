<?php


$api_partidos = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties";
$api_distritos = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results";
$api_circum = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts";

$partidosJson = json_decode(file_get_contents($api_partidos . "characters"), true);
$distritosJson = json_decode(file_get_contents($api_distritos . "characters"), true);
$api_circum = json_decode(file_get_contents($api_circum . "characters"), true);

include "partidos.php";
include "distritos.php";
include "circumscripcion.php";

