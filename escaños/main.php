<?php

$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidosJson = json_decode(file_get_contents($api_url."parties"), true);
$distritosJson = json_decode(file_get_contents($api_url."districts"), true);
$resultsJson = json_decode(file_get_contents($api_url."results"), true);

include "partidos.php";
include "distritos.php";
include "resultados.php";


//Funcion Objeto Partidos
function createPartidos($partidosJson)
{
    $objPartidos = array();
    foreach ($partidosJson as $partido) {
        $objPartido = new partidos($partido["id"], $partido["name"], $partido["acronym"], $partido["logo"]);
        $objPartidos[] = $objPartido;
    }
    return $objPartidos;
}


//Funcion Objeto Distrito
function createDistritos($distritosJson)
{
    $objDistritos=array();
    foreach ($distritosJson as $distrito){
        $objDistrito= new distritos($distrito["id"],$distrito["name"],$distrito["delegates"]);
        $objDistritos[]=$objDistrito;
    }
    return $objDistritos;
}


//Funcion Objeto Resultado
function createResultado($resultsJson)
{
    $objResultados = array();
    foreach ($resultsJson as $result) {
        $objResultado = new resultados($result["district"], $result["party"], $result["votes"]);
        $objResultados[] = $objResultado;
    }
    return $objResultados;
}


$partidos= createPartidos($partidosJson);
$distritos= createDistritos($distritosJson);
$results=createResultado($resultsJson);

var_dump($partidos);
var_dump($distritos);
var_dump($results);