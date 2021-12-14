<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "dbo.php";

//URL http://isanchez.dawsonferrer.com/cine

$dbo = new dbo();
$movies = $dbo->getMovies();
$genresfilter = $dbo->filterGenres();

$email="";
$user="";
$userPass="";

//$movie1 = $dbo->getMovie(1);
//echo "<pre>";
//var_dump($movie1->getGenres());

//sorting rating , year order by;
//filter generos, director group by;
//buscador?
//login cryp() para hacer comentarios
//modal para el login boton y sale ventana
//https://code.tutsplus.com/es/tutorials/create-a-php-login-form--cms-33261
//session start cuando se valida el login

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
            background: #222222 !important;


        }

        .card {
            background: #3d3d3d;
            border: 1px solid #c424dd;
            color: antiquewhite;
            margin-bottom: 2rem;
        }

        .custom .btn, .boton, .selection {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .custom .btn:hover, .boton:hover, .btn:focus, .boton:focus, .selection:focus, .selection:hover{
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: antiquewhite !important;
            border: 5px solid #5653b7 !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: none;
        }

        img {
            height: 350px; /* for IE 8 */
            overflow: hidden;

        }

        .custom {
            padding-top: 100px;
        }

        h1 {
            margin-top: 10px;
            font-size: 70px;
            color: antiquewhite;
            text-align: center;
            font-family: "Segoe Script";
            text-transform: none;
        }

        h3 {
            text-align: center;
            padding-bottom: 5px;
            color: antiquewhite;
        }


        a {
            text-decoration: none
        }

        p {
            color: antiquewhite
        }

        select, .boton, {
            height: 35px;
        }

        option, input{
            color: antiquewhite;
            background-color: #3d3d3d;
        }

        form{
            margin-left: 30px;
        }

        .formLog{
            text-align: right;
            margin-right: 30px;
        }

        .form-element{
            margin-bottom: 5px;
        }

        label{
            color: antiquewhite;
        }

    </style>

    <title>Only Movies!</title>

</head>
<body>

<a href="main.php">
    <h1>Only Movies!</h1>
</a>

<div class="container-fluid">
    <!--
    <form class="formLog" action="main.php" method="post" name="signup-form">
        <div class="form-element">
            <label>Email: </label>
            <input type="email" name="email" value="<?php //$email ?>" />
        </div>
            <div class="form-element">
                <label>Username: </label>
                <input type="text" name="username" value="<?php //$user ?>" required />
            </div>
            <div class="form-element">
                <label>Password: </label>
                <input type="password" name="password" value="<?php //$userPass ?>" required />
            </div>
            <button class="boton" type="submit" >Register</button>
    </form>
-->
    <!--FORMULARIO PARA FILTRAR POR GENEROS y ORDENAR POR VALORACION Y POR AÑO-->
    <form action="main.php" method="post">

        <select class="selection" name="genres">
            <option value='vacio'>Generos</option>
            <?php
            for ($i = 0; $i < count($genresfilter); $i++) {
                echo "<option value='" . $genresfilter[$i] . "'>" . $genresfilter[$i] . "</option>";
            }
            ?>
        </select>

        <select class="selection" name="sort">
            <option value='void'>Ordenar por:</option>
            <option value='yearMovies'>Año</option>
            <option value='ratingMovies'>Valoración</option>
            <option value='durationMovies'>Duración</option>

        </select>

        <button class="boton" type="submit">Filtrar</button>
    </form>
</div>



<div class="container mx-auto mt-4 custom">
    <div class="row">

        <?php
        $existe = "";

        //Comprueba si hay algun Orden
        if (isset($_POST["sort"])) {
            $sorted = ($_POST["sort"]);

            if ($sorted == "yearMovies") {
                $movies = $dbo->sortMovies($sorted);
            } elseif ($sorted == "ratingMovies") {
                $movies = $dbo->sortMovies($sorted);
            }elseif($sorted == "durationMovies") {
                $movies = $dbo->sortMovies($sorted);
            }

            //Comprueba si hay algun Genero
            if (isset($_POST["genres"])) {
                $genres = ($_POST["genres"]);
                if ($genres != "vacio") {
                    ?>

                    <h3><?php echo $genres; ?> </h3>

                <?php }


                foreach ($movies as $movie) {

                    foreach ($movie->getGenres() as $mGenre) {

                        //Entra aqui si hay algun genero elegido
                        if ($genres == $mGenre->getNameGenre()) {

                            ?>
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">

                                    <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>">
                                        <img src="<?php echo $movie->getImgMovie(); ?>" class="card-img-top" alt="...">
                                    </a>

                                    <div class="card-body">

                                        <h5 class="card-title"><?php echo $movie->getIdMovie() . " - " . $movie->getNameMovie(); ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Valoración: <?php echo $movie->getRatingMovie(); ?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Año: <?php echo $movie->getYearMovie(); ?></h6>
                                        <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>" class="btn mr-2"
                                           target="_blank">
                                            <i class="fas fa-link"></i>
                                            Más</a>

                                    </div>
                                </div>
                            </div>


                        <?php }

                        //Renderizado para cuando el valor es "vacio"
                        //"$existe" guarda el id de la pelicula para cuando recorremos el for de generos que no entre repetidas
                        else if ($genres == "vacio" && $existe != $movie->getIdMovie()) { ?>

                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">

                                    <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>">
                                        <img src="<?php echo $movie->getImgMovie(); ?>" class="card-img-top" alt="...">
                                    </a>

                                    <div class="card-body">

                                        <h5 class="card-title"><?php echo $movie->getIdMovie() . " - " . $movie->getNameMovie(); ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Valoración: <?php echo $movie->getRatingMovie(); ?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Año: <?php echo $movie->getYearMovie(); ?></h6>
                                        <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>" class="btn mr-2"
                                           target="_blank">
                                            <i class="fas fa-link"></i>
                                            Más</a>

                                    </div>
                                </div>
                            </div>


                            <?php

                            $existe = $movie->getIdMovie();
                        }
                    }
                }
            }
        } else {

            //Renderizado para mostrar la pagina cuando la ejecutamos la primera vez o cuando pinchamos en el nombre de la pagina
            foreach ($movies as $movie) { ?>

                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">

                        <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>">
                            <img src="<?php echo $movie->getImgMovie(); ?>" class="card-img-top" alt="...">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title"><?php echo $movie->getIdMovie() . " - " . $movie->getNameMovie(); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Valoración: <?php echo $movie->getRatingMovie(); ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Año: <?php echo $movie->getYearMovie(); ?></h6>
                            <a href="details.php?id=<?php echo $movie->getIdMovie(); ?>" class="btn mr-2"
                               target="_blank">
                                <i class="fas fa-link"></i>
                                Más</a>

                        </div>
                    </div>
                </div>


            <?php }
        } ?>

    </div>
</div>
</body>
</html>