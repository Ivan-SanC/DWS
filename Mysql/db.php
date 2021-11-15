<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidosJson = json_decode(file_get_contents($api_url . "parties"), true);
$distritosJson = json_decode(file_get_contents($api_url . "districts"), true);
$resultsJson = json_decode(file_get_contents($api_url . "results"), true);

//PASOS PARA ESTABLECER UNA CONEXION
//CREAR UNA DB E INSERTAR DATOS EN LA DB

//Mysql
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname="db_elections";


// Create connection

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";



//Create DB
$sql = "CREATE DATABASE IF NOT EXISTS db_elections;";
if ($conn->query($sql) === TRUE) {
    echo "Databases created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();


// Create connection con db
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

//Insert Partidos
foreach ($partidosJson as $partidoJson){
    $sql = 'INSERT INTO table_partidos (idPartidos, namePartidos, acronPartidos,logoPartidos)
VALUES ("'.$conn->real_escape_string($partidoJson["id"]).'",
        "'.$conn->real_escape_string($partidoJson["name"]).'",
        "'.$conn->real_escape_string($partidoJson["acronym"]).'",
        "'.$conn->real_escape_string($partidoJson["logo"]).'")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//Insert Distritos
foreach ($resultsJson as $resultJson){
    $sql = 'INSERT INTO table_resultados (districtsResults, partyResults,votesResults)
VALUES ("'.$conn->real_escape_string($resultJson["district"]).'",
        "'.$conn->real_escape_string($resultJson["party"]).'",
        "'.$conn->real_escape_string($resultJson["votes"]).'")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//Insert Resultados
foreach ($distritosJson as $distritoJson){
    $sql = 'INSERT INTO table_distritos (idDistritos, nameDistritos, delegatesDistritos)
VALUES ("'.$conn->real_escape_string($distritoJson["id"]).'",
        "'.$conn->real_escape_string($distritoJson["name"]).'",
        "'.$conn->real_escape_string($distritoJson["delegates"]).'")';

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();