<?php
include_once "author.php";
include_once "genre.php";
include_once "movie.php";
include_once "dbo.php";

$dbo = new dbo();
$movies = $dbo->getMovies();
$movie1 = $dbo->getMovie(1);
$genresfilter = $dbo->filterGenres();

//echo "<pre>";
//var_dump($movie1);
//var_dump($gfiltro);
//sorting rating , year, duration;
//filter generos, director
//buscador
//pinchar en imagen enlazar con pagina descripcion
//function sortingGenres()

?>
<html>
<head>
    <style>
        h1 {
            text-align: center;
            color: antiquewhite;
        }
        body{
            background-color: #222222;
        }
        p{
            color: antiquewhite;
        }

    </style>
    <title>Peliteca</title>
</head>
<body>
<h1>Peliteca</h1>
<form action="main.php" method="post">
    <select class="form-control me-2 form-select" name="genres">
        <option value='vacio'>Selecciona un genero</option>
        <?php
        for ($i = 0; $i < count($genresfilter); $i++) {
            echo "<option value='" . $genresfilter[$i] . "'>" . $genresfilter[$i] . "</option>";
        }

        ?>
    </select>
    <button class="btn btn-outline-success" type="submit">Filtra</button>
</form>
<div class="content">
    <?php foreach ($movies

    as $movie){ ?>
    <div class="card">
        <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>">
            <img src="<?php echo $movie->getImgMovie(); ?>" alt="front" width="100" height="150">
        </a>
        <p>
            <?php
            echo $movie->getNameMovie() . " (" . $movie->getYearMovie() . ") " . "Rating:" . $movie->getRatingMovie() . "<br>";
            //echo $movie->getDurationMovie()."<br>";
            //echo $movie->getAuthor()->getNameAuthor()."<br>";
            //echo $movie->getDescription()."<br>";
            ?>
        </p>

    </div>
</div>
<?php } ?>
</body>
</html>