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

echo "<pre>";
//var_dump($partidos);
//var_dump($distritos);
//var_dump($results);

//Calcula Escaños

//Calcula Escaños
function calculaEscanyos($results)
{
    global $distritos;
    $aZonas=array();
    $aOriginal=array();
    $votosTotales=0;


    //entra en distritos
    for ($i = 0; $i < count($distritos); $i++) {


        //recorre resultados
        for ($k = 0; $k < count($results); $k++) {

            //si el distrito coincide con el distristo del resultado
            if ($distritos[$i]->getName() == $results[$k]->getDistrito()) {
                //guarda los votos totales;
                $votosTotales=intval($results[$k]->getVotos())+$votosTotales;
                //se guarda en el array solo los objetos con el mismo distrito
                $aOriginal[]=[$results[$k]->getDistrito(), $results[$k]->getPartido(), $results[$k]->getVotos(), $results[$k]->getEscanyos()];
            }
        }

        //Se crea un segundo array sin el 3% de votos
        for($j=0;$j<count($aOriginal);$j++){
            if ($aOriginal[$j][2] >=$votosTotales*0.03) {
                $aZonas[] =$aOriginal[$j];
            }
        }


        //busca los escaños totales del distrito
        for ($m = 0; $m < intval($distritos[$i]->getDelegates()); $m++) {

            //ordena el array creado
                for ($l = 0; $l < count($aZonas); $l++) {
                    for ($f = $l + 1; $f < count($aZonas); $f++) {
                        if ($aZonas[$l][2] < $aZonas[$f][2]) {
                            $aux = $aZonas[$l];
                            $aZonas[$l] = $aZonas[$f];
                            $aZonas[$f] = $aux;
                        }
                    }

                }

                    $aZonas[0][3] += 1;
                    $aZonas[0][2] = $aZonas[0][2] / $aZonas[0][3];


        }
    }

    return $aZonas;
}


var_dump( calculaEscanyos($results));
//Funcion Ordenar provincia
//zonaEspecifica --partidos --votos --escañosZona


//Funcion Ordenar Partido
//zonas --partidoEspecifico --votos --escañosZona


//Funcion Ordenaro Escaños totales
//general --partidos --votosTotales --escañosTotales