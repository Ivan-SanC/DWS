<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "dbo.php";

$dbo = new dbo();

//crea la pelicula que hemos seleccionado en la pagina main
if (isset($_GET["id"])) {
    $movie = $dbo->getMovie($_GET["id"]);
} else {
    die("NO ID SELECTED");
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>


    <style>

        body {
            background-color: #222222;
        }

        h1 {
            margin-top: 9px;
            font-size: 70px;
            color: antiquewhite;
            text-align: center;
            font-family: "Segoe Script";
        }

        a {
            text-decoration: none
        }

        h3 {
            padding-bottom: 3px;
            color: antiquewhite;
        }

        h5 {
            color: antiquewhite;
        }


    </style>

    <title>Only Movies!</title>


</head>
<body>

<a href="main.php">
    <h1>Only Movies!</h1>
</a>

<!--RENDERIZADO-->

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col col-2 m-5">
            <img src="<?php echo $movie->getImgMovie(); ?>" alt="front" width="360" height="460">
        </div>

        <div class="col col-4 m-5">
            <iframe width="970" height="460" src="<?php echo $movie->getTrailerMovie(); ?>"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <div class="row ">
            <div class="col col-9 mx-5">
                <h3><?php echo $movie->getNameMovie() . " (" . $movie->getYearMovie() . ")"; ?> </h3>
                <h5>Generos:
                    <?php foreach ($movie->getGenres() as $mGenre) { ?>
                        <?php echo "&nbsp;" . $mGenre->getNameGenre(); ?>
                    <?php } ?>
                </h5>
                <h5>Valoración: <?php echo $movie->getRatingMovie(); ?> </h5>
                <h5> Duración: <?php echo $movie->getDurationMovie(); ?> min. </h5>
                <h5> Director: <?php echo $movie->getAuthor()->getNameAuthor(); ?> </h5>
                <h5>Descripción: <?php echo $movie->getDescription(); ?> </h5>
            </div>
        </div>


    </div>


</div>


</body>
</html>