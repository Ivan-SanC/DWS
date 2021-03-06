<?php
include "partidos.php";
include "distritos.php";
include "resultados.php";


//Mysql
$servername = "sql480.main-hosting.eu";
$username = "u850300514_isanchez";
$password = "x43223947R";
$dbname="u850300514_isanchez";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Objetos
//Funcion Objeto Partidos
function createPartidos($conn)
{
    $objPartidos = array();
    $sql = "SELECT idPartidos, namePartidos, acronPartidos,logoPartidos FROM table_partidos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objPartidos[] = new partidos($row["idPartidos"], $row["namePartidos"], $row["acronPartidos"], $row["logoPartidos"], 0, 0);

        }
    }
    return $objPartidos;
}


//Funcion Objeto Distrito
function createDistritos($conn)
{
    $objDistritos = array();
    $sql = "SELECT idDistritos, nameDistritos, delegatesDistritos FROM table_distritos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objDistritos[] = new distritos($row["idDistritos"], $row["nameDistritos"], $row["delegatesDistritos"]);

        }
    }
    return $objDistritos;
}


//Funcion Objeto Resultado
function createResultado($conn)
{

    $objResultados = array();
    $sql = "SELECT idResults, districtsResults, partyResults,votesResults FROM table_resultados";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objResultados[] = new resultados($row["districtsResults"], $row["partyResults"], $row["votesResults"], 0);

        }
    }
    return $objResultados;
}


$partidos = createPartidos($conn);
$distritos = createDistritos($conn);
$results = createResultado($conn);
$conn->close();

//echo "<pre>";
//var_dump($partidos);
//var_dump($distritos);
//var_dump($results);


//Calcula Esca??os
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


        //busca los esca??os totales del distrito
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

            //Reparte los esca??os
            for ($a = 0; $a < count($aOriginal); $a++) {
                if ($aZonas[0][0] == $aOriginal[$a][0] && $aZonas[0][1] == $aOriginal[$a][1]) {
                    $aZonas[0][3] += 1;
                    $aZonas[0][2] = $aOriginal[$a][2] / ($aZonas[0][3] + 1);
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


//Funcion Ordenar Partido
//general --partidoEspecifico --votos --esca??osZona
function sortGeneral($partidos)
{
    global $reparte;

    //Entra en partidos
    for ($i = 0; $i < count($partidos); $i++) {

        //Entra en la funcion calculaEscanyos
        for ($j = 0; $j < count($reparte); $j++) {

            //Compara que los partidos sean iguales
            if ($partidos[$i]->getName() == $reparte[$j]->getPartido()) {

                //Suma votos y esca??os
                $partidos[$i]->setVotos($partidos[$i]->getVotos() + $reparte[$j]->getVotos());
                $partidos[$i]->setEscanyos($partidos[$i]->getEscanyos() + $reparte[$j]->getEscanyos());
            }
        }
    }

    return $partidos;
}

//var_dump(sortGeneral($partidos));
$generales = sortGeneral($partidos);

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

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border-bottom: 3px solid black;
            text-align: left;
            padding-left: 12px;
            padding-right: 12px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="main.php" method="post">
                <select class="form-control me-2 form-select" name="district">
                    <option value='circum'>Selecciona una circumscripci??n</option>
                    <option value='generales'>Resultados Generales</option>
                    <?php
                    for ($i = 0; $i < count($distritos); $i++) {
                        echo "<option value='" . $distritos[$i]->getName() . "'>" . $distritos[$i]->getName() . "</option>";
                    }

                    ?>
                </select>
                <select class="form-control me-2 form-select" name="party">
                    <option value='vacio'>Selecciona un partido</option>
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
    echo "<br><br><br>";
    $district=array();

    if (isset($_POST["district"])) {
        $district = ($_POST["district"]);

        //Distritos
        if ($district != "circum" && $district != "generales") {

            echo "<tr><th>Circumscripci??n</th><th>Partido</th><th>Votos</th><th>Esca??os</th></tr>";
            for ($i = 0; $i < count($reparte); $i++) {
                for ($j = 0; $j < count($partidos); $j++) {
                    if ($district == $reparte[$i]->getDistrito() && $reparte[$i]->getPartido() == $partidos[$j]->getName()) {
                        echo "<tr><td>" . $reparte[$i]->getDistrito() . "</td><td><img alt='logo' height='25px' src='" . $partidos[$j]->getLogo() . "'> <strong>" . $partidos[$j]->getAcronimo() . "</strong> - " . $reparte[$i]->getPartido() . "</td><td>" .
                            $results[$i]->getVotos() . "</td><td>" . $reparte[$i]->getEscanyos() . "</td></tr>";

                    }
                }
            }

            //Generales
        } elseif ($district == "generales") {

            echo "<tr><th>Circumscripci??n</th><th>Partido</th><th>Votos</th><th>Esca??os</th></tr>";
            for ($i = 0; $i < count($generales); $i++) {
                echo "<tr><td>Generales</td><td><img alt='logo' height='25px' src='" . $generales[$i]->getLogo() . "'> <strong>" . $generales[$i]->getAcronimo() . "</strong> - " . $generales[$i]->getName() . "</td><td>" .
                    $generales[$i]->getVotos() . "</td><td>" . $generales[$i]->getEscanyos() . "</td></tr>";

            }

        }
    }

    //Partidos
    if ($district == "circum") {

        if (isset($_POST["party"])) {
            $party = ($_POST["party"]);

            if ($party != "vacio") {

                echo "<tr><th>Circumscripci??n</th><th>Partido</th><th>Votos</th><th>Esca??os</th></tr>";
                for ($i = 0; $i < count($reparte); $i++) {
                    for ($j = 0; $j < count($partidos); $j++) {
                        if ($party == $reparte[$i]->getPartido() && $party == $partidos[$j]->getName()) {
                            echo "<tr><td>" . $reparte[$i]->getDistrito() . "</td><td><img alt='logo' height='25px' src='" . $partidos[$j]->getLogo() . "'> <strong>" . $partidos[$j]->getAcronimo() . "</strong> - " . $reparte[$i]->getPartido() . "</td><td>" .
                                $results[$i]->getVotos() . "</td><td>" . $reparte[$i]->getEscanyos() . "</td></tr>";

                        }
                    }
                }
            }
        }


    }

    ?>
</table>
</body>