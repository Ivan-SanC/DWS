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
        $objResultado = new resultados($result["district"], $result["party"], $result["votes"],0);
        $objResultados[] = $objResultado;
    }
    return $objResultados;
}


$partidos= createPartidos($partidosJson);
$distritos= createDistritos($distritosJson);
$results=createResultado($resultsJson);
$x=1;
echo "<pre>";
//var_dump($partidos);
//var_dump($distritos);
//var_dump($results);

//Calcula Escaños
function calculaEscanyos($results){
    global $distritos;

    $votosTotales= 0;
    $aZonas= array();


    for ($i=0;$i<count($distritos);$i++){

        //guarda los votos tototales del disitrito
        for($j=0;$j<count($results);$j++){
            if($distritos[$i]->getName()==$results[$j]->getDistrito()){
                $votosTotales=$results[$j]->getVotos()+$votosTotales;
                //guarda los datos en el array para buscarlos
                $aZonas[]=[$results[$j]->getDistrito(), $results[$j]->getPartido(),$results[$j]->getVotos()];
            }
        }
        //Calcula los escaños de cada partido en las zonas (sigue en el primer bucle)
        //la idea es que el aZonas reparta los escaños y se guarden el results
        for($m=0;$m<count($distritos[$i]->getDelegates());$m++){

        }


    }

    return $results;
}


var_dump( calculaEscanyos($results));
//Funcion Ordenar provincia
//zonaEspecifica --partidos --votos --escañosZona


//Funcion Ordenar Partido
//zonas --partidoEspecifico --votos --escañosZona


//Funcion Ordenaro Escaños totales
//general --partidos --votosTotales --escañosTotales