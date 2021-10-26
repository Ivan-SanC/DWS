<?php
$seed = 3497; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);


include 'characters.php';
include 'episodes.php';
include 'locations.php';


function createCharacters($characters)
{
    $objCharacters=array();
    foreach ($characters as $character) {
        $objcharacter = new characters($character["id"], $character["name"], $character["status"], $character["species"],
            $character["type"], $character["gender"], $character["origin"], $character["location"], $character["image"], $character["episodes"]);

        $objCharacters[] = $objcharacter;

    }
    return $objCharacters;
}


function createEpisodes($episodes)
{
    $objEpisodes=array();

    foreach ($episodes as $episode) {
        $objEpisode = new episodes($episode["id"], $episode["name"], $episode["air_date"], $episode["episode"], $episode["created"], $episode["characters"]);
        $objEpisodes=$objEpisode;
    }
    return $objEpisodes;
}


function createLocations($locations)
{
    $objLocations=array();
    foreach ($locations as $location) {
        $objLocation = new locations($location["id"], $location["name"], $location["type"], $location["dimension"], $location["created"], $location["residents"]);
        $objLocations=$objLocation;
    }
    return $objLocations;
}

$personaje = createCharacters($characters);
$ubicacion= createLocations($locations);
$episodio=createEpisodes($episodes);

function mapCharacters($personaje)
{

    global $episodio;
    global $ubicacion;

    for ($i = 0; $i < count($personaje); $i++) {
        for ($j = 0; $j < count($ubicacion); $j++) {

            if ($personaje[$i]->getOrigin() == intval($ubicacion[$j]->getId())) {
                $personaje->setOrigin($ubicacion[$j]->getName());
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
                    $personaje[$i]->setEpisodes($episodio->getName())[$k];
                } elseif ($personaje[$i]->getEpisodes()[$k] == "0") {
                    $personaje[$i]->setEpisodes("Unknown")[$k];
                }


            }
        }
    }
    return $personaje;
}

$mappedCharacters = mapCharacters($personaje);
var_dump($mappedCharacters);



