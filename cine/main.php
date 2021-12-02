<?php
include_once "author.php";
include_once "genre.php";
include_once "movie.php";
include_once "dbo.php";

$dbo= new dbo();
$movies= $dbo->getMovies();
$movie1= $dbo->getMovie(1);
$gfiltro=$dbo->filterGenres();

/*echo "<pre>";
var_dump($movie1);
var_dump($gfiltro);
*/
//sorting rating , director, year, duration, generos;
//buscador
//pinchar en imagen enlazar con pagina descripcion
//function sortingGenres()

?>
<html>
<head>
    <style>
        h1{
            text-align: center;
        }


    </style>
    <title>Peliteca</title>
</head>
<body>
<h1>Peliteca</h1>

<select class="form-control me-2 form-select" name="genres">
    <option value='vacio'>Selecciona un genero</option>
    <?php
    for ($i = 0; $i < count($gfiltro); $i++) {
        echo "<option value='" . $gfiltro[$i]. "'>" . $gfiltro[$i]. "</option>";
    }

    ?>
</select>
</body>
</html>