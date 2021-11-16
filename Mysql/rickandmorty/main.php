<?php

include 'character.php';
include 'episode.php';
include 'location.php';

//Mysql
$servername = "sql480.main-hosting.eu";
$username = "u850300514_isanchez";
$password = "x43223947R";
$dbname="u850300514_isanchez";

//Creating connection with DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection faile: " . $conn->connect_error);
}


function createCharacters($conn)
{
    $objCharacters = array();
     $sql = "SELECT idChar,nameChar,statusChar,speciesChar,
    typeChar,genderChar,originChar,locationChar,imageChar,createdChar,episodesChar FROM table_characters";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objCharacters[] = new character($row["idChar"], $row["nameChar"], $row["statusChar"], $row["speciesChar"], $row["typeChar"],
                $row["genderChar"],$row["originChar"],$row["locationChar"],$row["imageChar"],$row["createdChar"],json_decode($row["episodesChar"]));

        }
    }
    return $objCharacters;
}



function createEpisodes($conn)
{
    $objEpisodes = array();
     $sql = "SELECT idEpi,nameEpi,airDateEpi,episodeEpi,createdEpi,charactersEpi FROM table_episodes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objEpisodes[] = new episode($row["idEpi"], $row["nameEpi"], $row["airDateEpi"],
                $row["episodeEpi"], $row["createdEpi"], json_decode($row["charactersEpi"]));
        }
    }
    return $objEpisodes;
}


function createLocations($conn)
{
    $objLocations = array();
     $sql = "SELECT idLoc,nameLoc,typeLoc,dimensionLoc,createdLoc,residentsLoc FROM table_locations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $objLocations[] = new location($row["idLoc"], $row["nameLoc"], $row["typeLoc"], $row["dimensionLoc"],
                $row["createdLoc"], json_decode($row["residentsLoc"]));

        }
    }
    return $objLocations;
}

$personaje = createCharacters($conn);
$episodio = createEpisodes($conn);
$ubicacion = createLocations($conn);

//echo "<pre>";
//var_dump($ubicacion);


function getSortedCharactersById($personaje)
{
    for ($i = 0; $i < count($personaje) - 1; $i++) {
        for ($j = $i + 1; $j < count($personaje); $j++) {
            if ($personaje[$i]->getID() > $personaje[$j]->getID()) {
                $aux = $personaje[$i];
                $personaje[$i] = $personaje[$j];
                $personaje[$j] = $aux;
            }
        }
    }
    return $personaje;
}

function getSortedCharactersByOrigin($personaje)
{
    for ($i = 0; $i < count($personaje) - 1; $i++) {
        for ($j = $i + 1; $j < count($personaje); $j++) {
            if ($personaje[$i]->getOrigin() > $personaje[$j]->getOrigin()) {
                $aux = $personaje[$i];
                $personaje[$i] = $personaje[$j];
                $personaje[$j] = $aux;
            }
        }
    }
    return $personaje;
}


function getSortedCharactersByStatus($personaje)
{
    for ($i = 0; $i < count($personaje) - 1; $i++) {
        for ($j = $i + 1; $j < count($personaje); $j++) {
            if ($personaje[$i]->getStatus() > $personaje[$j]->getStatus()) {
                $aux = $personaje[$i];
                $personaje[$i] = $personaje[$j];
                $personaje[$j] = $aux;
            }
        }
    }
    return $personaje;
}


function mapCharacters($personaje)
{

    global $episodio;
    global $ubicacion;
    $epnames = array();


    for ($i = 0; $i < count($personaje); $i++) {
        for ($j = 0; $j < count($ubicacion); $j++) {

            if ($personaje[$i]->getOrigin() == intval($ubicacion[$j]->getId())) {
                $personaje[$i]->setOrigin($ubicacion[$j]->getName());

            } elseif ($personaje[$i]->getOrigin() == "0") {
                $personaje[$i]->setOrigin("Unknown");
            }

            if ($personaje[$i]->getLocation() == intval($ubicacion[$j]->getId())) {
                $personaje[$i]->setLocation($ubicacion[$j]->getName());

            } elseif ($personaje[$i]->getLocation() == "0") {
                $personaje[$i]->setLocation("Unknown");
            }

        }

        for ($k = 0; $k < count($personaje[$i]->getEpisodes()); $k++) {
            for ($m = 0; $m < count($episodio); $m++) {

                if ($personaje[$i]->getEpisodes()[$k] == intval($episodio[$m]->getId())) {

                    $epnames[$k] = $episodio[$m]->getName();

                } elseif ($personaje[$i]->getEpisodes()[$k] == "0") {

                    $epnames[$k] = "unknown";
                }
            }
        }

        //primero se tiene que generar el array de episiodios y luego setearlo
        $personaje[$i]->setEpisodes($epnames);
    }
    return $personaje;
}


function render($character) {


    echo '<div class="col-md-4 col-sm-12 col-xs-12"><div class="card mb-4 box-shadow bg-light">';
    echo '<img class="card-img-top" src="'. $character->getImage() .'" alt="'.$character->getImage().'">';
    echo '<div class="card-body"><h5 class="card-title">'. $character->getName().'</h5>';
    $alertClass = "success";
    switch ($character->getStatus()) {
        case "Dead":
            $alertClass = "danger";
            break;
        case "unknown":
            $alertClass = "warning";
            break;
    }
    echo '<div class="alert alert-'.$alertClass.'" style="padding:0;" role="alert">'. $character->getStatus() .' - '. $character->getSpecies() .'</div>';
    echo '<form><div class="mb-3" style="margin-bottom:0!important;">';
    echo '<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Origin:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'.  $character->getOrigin() .'</div></div>';
    echo '<div class="mb-3"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Last known location:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'. $character->getLocation() .'</div></div></form>';
    echo '<div class="d-flex justify-content-between align-items-center"><div class="btn-group">';
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#characterModal_'.$character->getId().'">View episodes</button>';
    echo '<div class="modal fade" id="characterModal_'.$character->getId().'" tabindex="-1" aria-labelledby="characterModalLabel_'.$character->getId().'" aria-hidden="true">';
    echo '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
    echo '<h5 class="modal-title" id="characterModalLabel_'.$character->getId().'">Episodes list </h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>';
    echo '<div class="modal-body"><ol class="list-group">';

    foreach ($character->getEpisodes() as $episode => $a) {
        echo '<li class="list-group-item">'. $a .'</li>';
    }

    echo '</ol></div>';
    echo '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div></div>';
    echo '<small class="text-muted">'.$character->getCreated() .'</small></div></div></div></div>';
}

$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $personaje = getSortedCharactersById($personaje);
           // var_dump(getSortedCharactersById($personaje));
            break;
        case "origin":
            $personaje = getSortedCharactersByOrigin($personaje);
           // var_dump(getSortedCharactersByOrigin($personaje));
            break;
        case "status":
            $personaje = getSortedCharactersByStatus($personaje);
           // var_dump(getSortedCharactersByStatus($personaje));
            break;
    }
}


//mapeo despues del sorting para que ordene
$mappedCharacters = mapCharacters($personaje);

?>
<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="main.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">

                <?php

                foreach ($mappedCharacters as $i => $key) {
                    render($key);
                }

                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>