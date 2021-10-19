<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);
echo "<pre>";
var_dump($contents_cities);
echo "</pre>";
echo "<pre>";
var_dump($contents_countries);
echo "</pre>";

function mapCities()
{
    global $cities;
    global $countries;

    for($i=0;$i<count($cities);$i++){
        for ($j=0;$j<count(($countries);$j++)){

        }
    }


}

function mapCountries()
{
    //TODO: Your code here
}

var_dump(mapCities());
var_dump(mapCountries());