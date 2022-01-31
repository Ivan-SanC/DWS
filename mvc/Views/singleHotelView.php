<?php
/**
 * @var hotel $hotel ;
 * @var string $errorCode;
 * @var array $comments;
 */
?>
<html>
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --gradient: linear-gradient(to left top, #1b2354 10%, #3d3c6b 90%) !important;
        }

        body {
            background-image: linear-gradient(to right bottom, rgba(36, 95, 221, 0.42) 10%, #5653b7 90%);
        }

        a {
            text-decoration: none
        }

        h2, a, label {
            color: antiquewhite;
        }

        h1 {
            margin-top: 10px;
            font-size: 70px;
            color: antiquewhite;
            text-align: center;
            text-transform: none;
        }

        img {

            height: 670px;
        }

        .carousel-control-prev-icon {
            width: 40px;
            height: 40px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon {
            width: 40px;
            height: 40px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
        }

        .btn {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: antiquewhite;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .btn:hover, .btn:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: antiquewhite !important;
            border: 5px solid #5653b7 !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: none;
        }

        .box {
            background-image: linear-gradient(to right bottom, #4151a8 10%, #3d3c6b 90%);
        }
        .article-box {
            padding: 10px;
            background: #52609b;

        }

        .article-text {
            margin: 5px;
            padding: 10px;
            background: #7a87c2;
        }

        .article-box > h2, .article-text > p {
            margin: 4px;
            font-size: 90%;
            color: antiquewhite;
        }

    </style>

</head>
<body>
<section class="head">
    <div class="container mb-5">
        <a href="list.php"><h1 class="text-center">Ebooking</h1></a>

        <div style="position: absolute; top: 10px; right: 10px">
            <?php if (isset($_SESSION["userName"])) { ?>
                <h6 class="text-right"><span>Bienvenido: <?php echo $_SESSION["userName"] ?></span></h6>
                <a href="../Controllers/close.php" class="btn" role="button">
                    Logout
                </a>
            <?php } else { ?>
                <a href="../Controllers/login.php" class="btn" role="button">
                    Iniciar Sesión
                </a>
                <a href="../Controllers/register.php" class="btn" role="button">
                    Registrar
                </a>
            <?php } ?>
        </div>
    </div>

</section>
<?php if ($errorCode == 1) {
    echo "<script>alert('No puedes elegir una fecha anterior al check-in!')</script>";
}elseif ($errorCode==2){
    echo "<script>alert('Fechas no disponibles! ')</script>";
}elseif($errorCode==3){
    echo "<script>alert('Reserva completada! ')</script>";
}
?>
<div class="clearfix"></div>

<?php if (isset($_SESSION["userName"])){ ?>
    <!--Datepicker-->
    <div class="box container pt-3 mt-5 border">
        <form method="post">
            <div class=" row">

                <div class="date col-6 text-center">
                    <label for="start">Entrada:</label>
                    <input type="date" id="start" name="check-in"
                           min="2022-01-01" max="2023-12-31" required>
                </div>

                <div class="date col-4 text-center">
                    <label for="end">Salida:</label>
                    <input type="date" id="end" name="check-out"
                           min="2022-01-01" max="2023-12-31" required>
                    <button class="boton" type="submit" name="submit">Reservar</button>
                </div>


            </div>
        </form>
    </div>
<?php } ?>
<div class="container p-5 border">

    <div class="name mb-5 text-center">
        <h2><?php echo $hotel->getNameHotel(); ?> <span><?php echo $hotel->getStarsHotel(); ?> &#11088;</span></h2>
    </div>

    <div class="serv mb-5">
        <p>
            <strong>Ubicación: </strong><?php echo $hotel->getNeighbor()->getNameNeighbor() . ", " . $hotel->getNeighbor()->getZip() . ", "
                . $hotel->getCity()->getNameCity() . ", " . $hotel->getState()->getNameState() . ", " . $hotel->getCountry()->getNameCountry() . "."; ?>
        </p>
        <p><strong>Descripción: </strong><?php echo $hotel->getDescription(); ?></p>

        <p><strong>Servicios Destacados:</strong>
            <?php foreach ($hotel->getServices() as $hService) { ?>
                <?php echo $hService->getNameService(); ?>
            <?php } ?>
        </p>
        <p><strong>Price:</strong> <?php echo $hotel->getPrice()."€/Noche"; ?></p>
    </div>

    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="<?php echo $hotel->getSources()[0]->getUrl(); ?>" class="d-block w-100" alt="...">
            </div>
            <?php for ($i = 1; $i < count($hotel->getSources()); $i++) { ?>
                <div class="carousel-item">
                    <img src="<?php echo $hotel->getSources()[$i]->getUrl(); ?>" class="d-block w-100"
                         alt="...">
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>
<!--comentarios-->

<div class="container mb-5 border">
    <div class="comment-box mt-4 mx-5">
        <h3>Comentarios</h3>
        <article class="article-box mb-5">
            <?php  foreach ($comments as $comment) { ?>
                <p><strong> <?php echo $comment->getNameUser(); ?> comentó:</strong></p>
                <article class="article-text ">
                    <p><?php echo $comment->getComment(); ?></p>
                </article>
            <?php } ?>
        </article>
    </div>

    <?php

    //Formulario comentarios
    if (isset($_SESSION["userName"])) { ?>
    <form class="formLog mx-5" method="post" action="../Controllers/extrasController.php">
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