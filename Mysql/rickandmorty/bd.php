<?php

$seed = 3947;
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$charactersJson = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJson = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJson = json_decode(file_get_contents($api_url . "locations"), true);


//Mysql
$servername = "sql480.main-hosting.eu";
$username = "u850300514_isanchez";
$password = "x43223947R";
$dbname="u850300514_isanchez";


//Connection

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


//Create DB

$sql = "CREATE DATABASE IF NOT EXISTS u850300514_isanchez;";
if ($conn->query($sql) === TRUE) {
    echo "DB created successfully <br>";
} else {
    echo "Error creating DB: " . $conn->connect_error;
}
$conn->close();


//Creating connection with DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


//Tables

//Characters
$sql = "CREATE TABLE IF NOT EXISTS table_characters(
    idChar VARCHAR(200) NOT NULL PRIMARY KEY,
    nameChar VARCHAR(200) NOT NULL,
    statusChar VARCHAR(200) NOT NULL,
    speciesChar VARCHAR(200) NOT NULL,
    typeChar VARCHAR(200) NOT NULL,
    genderChar VARCHAR(200) NOT NULL,
    originChar INT(10) NOT NULL,
    locationChar INT(10) NOT NULL,
    imageChar VARCHAR(200) NOT NULL,
    createdChar VARCHAR(200) NOT NULL,
    episodesChar VARCHAR(200) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Characters created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


//Episodes
$sql = "CREATE TABLE IF NOT EXISTS table_episodes(   
    idEpi VARCHAR(200) NOT NULL PRIMARY KEY,
    nameEpi VARCHAR(200) NOT NULL,
    airDateEpi VARCHAR(200) NOT NULL,
    episodeEpi VARCHAR(200) NOT NULL,
    createdEpi VARCHAR(200) NOT NULL,
    charactersEpi VARCHAR(999) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Episodes created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


//Locations
$sql = "CREATE TABLE IF NOT EXISTS table_locations(   
    idLoc VARCHAR(200) NOT NULL PRIMARY KEY,
    nameLoc VARCHAR(200) NOT NULL,
    typeLoc VARCHAR(200) NOT NULL,
    dimensionLoc VARCHAR(200) NOT NULL,
    createdLoc VARCHAR(200) NOT NULL,
    residentsLoc VARCHAR(999) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Locations created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


//Insert Characters
foreach ($charactersJson as $characterJson) {
    $sql = 'INSERT INTO table_characters (idChar,nameChar,statusChar,speciesChar,
    typeChar,genderChar,originChar,locationChar,imageChar,createdChar,episodesChar)
VALUES ("' . $conn->real_escape_string($characterJson["id"]) . '",
        "' . $conn->real_escape_string($characterJson["name"]) . '",
        "' . $conn->real_escape_string($characterJson["status"]) . '",
        "' . $conn->real_escape_string($characterJson["species"]) . '",
        "' . $conn->real_escape_string($characterJson["type"]) . '",
        "' . $conn->real_escape_string($characterJson["gender"]) . '",
        "' . $conn->real_escape_string($characterJson["origin"]) . '",
        "' . $conn->real_escape_string($characterJson["location"]) . '",
        "' . $conn->real_escape_string($characterJson["image"]) . '",
        "' . $conn->real_escape_string($characterJson["created"]) . '",
        "' . json_encode($characterJson["episodes"]). '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//Insert Episodes
foreach ($episodesJson as $episodeJson) {
    $sql = 'INSERT INTO table_episodes (idEpi,nameEpi,airDateEpi,
                            episodeEpi,createdEpi,charactersEpi)
VALUES ("' . $conn->real_escape_string($episodeJson["id"]) . '",
        "' . $conn->real_escape_string($episodeJson["name"]) . '",
        "' . $conn->real_escape_string($episodeJson["air_date"]) . '",
        "' . $conn->real_escape_string($episodeJson["episode"]) . '",
        "' . $conn->real_escape_string($episodeJson["created"]) . '",
        "' .json_encode($episodeJson["characters"]) . '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//Insert Locations
foreach ($locationsJson as $locationJson) {
    $sql = 'INSERT INTO table_locations (idLoc,nameLoc,typeLoc,
                             dimensionLoc,createdLoc,residentsLoc)
VALUES ("' . $conn->real_escape_string($locationJson["id"]) . '",
        "' . $conn->real_escape_string($locationJson["name"]) . '",
        "' . $conn->real_escape_string($locationJson["type"]) . '",
        "' . $conn->real_escape_string($locationJson["dimension"]) . '",
        "' . $conn->real_escape_string($locationJson["created"]) . '",
        "' . json_encode($locationJson["residents"]) . '")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

















