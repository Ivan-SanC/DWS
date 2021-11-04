<?php

$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidosJson = json_decode(file_get_contents($api_url . "parties"), true);
$distritosJson = json_decode(file_get_contents($api_url . "districts"), true);
$resultsJson = json_decode(file_get_contents($api_url . "results"), true);

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
    $objDistritos = array();
    foreach ($distritosJson as $distrito) {
        $objDistrito = new distritos($distrito["id"], $distrito["name"], $distrito["delegates"]);
        $objDistritos[] = $objDistrito;
    }
    return $objDistritos;
}


//Funcion Objeto Resultado
function createResultado($resultsJson)
{

    $objResultados = array();
    foreach ($resultsJson as $result) {
        $objResultado = new resultados($result["district"], $result["party"], $result["votes"], 0);
        $objResultados[] = $objResultado;
    }
    return $objResultados;
}


$partidos = createPartidos($partidosJson);
$distritos = createDistritos($distritosJson);
$results = createResultado($resultsJson);

echo "<pre>";
//var_dump($partidos);
//var_dump($distritos);
//var_dump($results);

//Calcula Escaños

//Calcula Escaños
function calculaEscanyos($results)
{
    global $distritos;


    //entra en distritos
    for ($i = 0; $i < count($distritos); $i++) {
        $aZonas = array();
        $aOriginal = array();
        $votosTotales = 0;

        //recorre resultados
        for ($k = 0; $k < count($results); $k++) {

            //si el distrito coincide con el distristo del resultado
            if ($distritos[$i]->getName() == $results[$k]->getDistrito()) {
                //guarda los votos totales;
                $votosTotales = intval($results[$k]->getVotos()) + $votosTotales;
                //se guarda en el array solo los objetos con el mismo distrito
                $aOriginal[] = [$results[$k]->getDistrito(), $results[$k]->getPartido(), $results[$k]->getVotos(), $results[$k]->getEscanyos()];
            }
        }

        //Se crea un segundo array sin el 3% de votos
        for ($j = 0; $j < count($aOriginal); $j++) {
            if ($aOriginal[$j][2] >= intval($votosTotales * 0.03)) {
                $aZonas[] = $aOriginal[$j];
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

            //Reparte los escaños
            for ($a = 0; $a < count($aOriginal); $a++) {
                if ($aZonas[0][0] == $aOriginal[$a][0] && $aZonas[0][1] == $aOriginal[$a][1]) {
                    $aZonas[0][3] += 1;
                    $aZonas[0][2] = intval($aOriginal[$a][2] / $aZonas[0][3]);
                }

            }

        }
        //se introduce los escanyos en el objeto
        for ($x = 0; $x < count($aZonas); $x++) {
            for ($z = 0; $z < count($results); $z++) {
                if ($aZonas[$x][0] == $results[$z]->getDistrito() && $aZonas[$x][1] == $results[$z]->getPartido()) {
                    $results[$z]->setEscanyos($aZonas[$x][3]);
                }
            }
        }
    }

    return $results;
}

//var_dump(calculaEscanyos($results));
$reparte = calculaEscanyos($results);

//Hacer todas las opciones y mirar como enlazar solo en un form
//Funcion Ordenar Partido
//zonas --partidoEspecifico --votos --escañosZona


//Funcion Ordenaro Escaños totales
//general --partidos --votosTotales --escañosTotales

?>
<html lang="es">
<head>
    <title>Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 12px;
            padding-right: 12px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="main.php" method="post">
                <select class="form-control me-2 form-select" name="district">
                    <option selected value='vacio'>Selecciona una circumscripción</option>
                    <option value='generales'>Resultados Generales</option>
                    <?php
                    for ($i = 0; $i < count($distritos); $i++) {
                        echo "<option value='" . $distritos[$i]->getName() . "'>" . $distritos[$i]->getName() . "</option>";
                    }

                    ?>
                </select>
                <select class="form-control me-2 form-select" name="party">
                    <option selected value='vacio'>Selecciona un partido</option>
                    <?php
                    for ($i = 0; $i < count($partidos); $i++) {
                        echo "<option value='" . $partidos[$i]->getName() . "'>" . $partidos[$i]->getName() . "</option>";
                    }

                    ?>
                </select>
                <button class="btn btn-outline-success" type="submit">Filtra</button>
            </form>
        </div>
    </div>
</nav>
<table>
    <?php

    //Funcion Ordenar provincia
    //zonaEspecifica --partidos --votos --escañosZona
    if (isset($_POST["district"])) {
        $district = $_POST["district"];
        if ($district != "vacio") {

            echo "<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>";
            for ($i = 0; $i < count($reparte); $i++) {
                if ($district == $reparte[$i]->getDistrito()) {
                    echo "<tr><td>" . $reparte[$i]->getDistrito() . "</td><td>" . $reparte[$i]->getPartido() . "</td><td>" .
                        $results[$i]->getVotos() . "</td><td>" . $reparte[$i]->getEscanyos() . "</td></tr>";


                }
            }
        }
    }
    if (isset($_POST["party"])) {
        $party = $_POST["party"];
        if ($party != "vacio") {

            echo "<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>";
            for ($i = 0; $i < count($reparte); $i++) {
                if ($party == $reparte[$i]->getDistrito()) {
                    echo "<tr><td>" . $reparte[$i]->getDistrito() . "</td><td>" . $reparte[$i]->getPartido() . "</td><td>" .
                        $results[$i]->getVotos() . "</td><td>" . $reparte[$i]->getEscanyos() . "</td></tr>";


                }
            }
        }
    }
    ?>
</table>
</body>
