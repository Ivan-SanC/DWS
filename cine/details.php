<?php

use DB\dbo;

include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "dbo.php";
include_once "comment.php";

session_start();
$dbo = new dbo();

//crea la pelicula que hemos seleccionado en la pagina main
if (isset($_GET["id"])) {
    $movie = $dbo->getMovie($_GET["id"]);
    $datos = $dbo->getComments($_GET["id"]);
    $_SESSION["movie"] = $_GET["id"];
    $validarLike = $dbo->validaUserId($_SESSION["userId"], $_SESSION["movie"]);
} else {
    die(header('Location: main.php'));

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

        :root {
            --gradient: linear-gradient(to left top, #c424dd 10%, #5653b7 90%) !important;
        }

        body {
            background-color: #222222;
        }

        .boton {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
            height: 35px;
        }

        .boton:hover, .boton:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: antiquewhite !important;
            border: 5px solid #5653b7 !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: none;
        }

        .btnbox {
            text-align: right;
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

        .article-box {
            padding: 10px;
            background-color: #3d3d3d;
        }

        .article-text {
            margin: 5px;
            padding: 10px;
            background: #222222;
        }

        .article-box > h2, .article-text > p {
            margin: 4px;
            font-size: 90%;
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

<div class="container-fluid">

    <div class="btnbox">
        <?php if (isset($_SESSION["userId"])) { ?>

            <button class="boton" onclick="location.href='close.php'">Cerrar sesión</button>

        <?php } else { ?>

            <button class="boton" onclick="location.href='login.php'">Iniciar sesión</button>
            <button class="boton" onclick="location.href='registrar.php'">Registro</button>

        <?php } ?>

    </div>
</div>

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

                <h3>
                    <?php echo $movie->getNameMovie() . " (" . $movie->getYearMovie() . ")";



                    echo "</h3>";
                    if (isset($_SESSION["userId"]) && !$validarLike) { ?>
                        <form method="post" action="formComent.php">
                            <button  class="boton" name="like" value="1" type="submit">Like</button>
                        </form>
                    <?php } ?>
                    <h5>Generos:
                        <?php foreach ($movie->getGenres() as $mGenre) { ?>
                            <?php echo "&nbsp;" . $mGenre->getNameGenre(); ?>
                        <?php } ?>
                    </h5>
                    <h5>Valoración: <?php echo $movie->getRatingMovie(); ?> </h5>
                    <h5>Likes: <?php echo $dbo->getLikes($_SESSION["movie"]); ?></h5>
                    <h5> Duración: <?php echo $movie->getDurationMovie(); ?> min. </h5>
                    <h5> Director: <?php echo $movie->getAuthor()->getNameAuthor(); ?> </h5>
                    <h5>Descripción: <?php echo $movie->getDescription(); ?> </h5>

            </div>

        </div>

    </div>

</div>

<!--comentarios-->

<div class="container-fluid mt-2">
    <div class="comment-box mt-4 mx-5">
        <h3>Comentarios</h3>
        <article class="article-box mb-5">
            <?php foreach ($datos as $dato) { ?>
                <h2><?php echo $dato->getNameUser(); ?> comentó:</h2>
                <article class="article-text">
                    <p><?php echo $dato->getComment(); ?></p>
                </article>
            <?php } ?>
        </article>
    </div>

    <?php
    //boton con value 1 insert en db userId solo 1 like mandar a formComent
    // getlike hacer suma de la columna likes where idMovie

    //Formulario comentarios
    if (isset($_SESSION["userId"])) { ?>
    <form class="formLog mx-5" method="post" action="formComent.php">
        <div class="form-element">
            <textarea name="comentario" placeholder="Danos tu opinión..." rows="5" cols="80" maxlength="255"
                      required></textarea>
        </div>
        <button class="boton mt-1" type="submit">Enviar</button>
    </form>
</div>

<?php } ?>

</body>
</html>