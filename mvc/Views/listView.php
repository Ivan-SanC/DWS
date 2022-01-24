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
            background-image: linear-gradient(to right bottom, rgba(36, 95, 221, 0.42) 10%, #5653b7 90%)
        }

        a {
            text-decoration: none
        }

        img {
            width: 420px;
            height: 310px;
        }
        h1 {
            margin-top: 10px;
            font-size: 70px;
            color: antiquewhite;
            text-align: center;
            text-transform: none;
        }

        h2, a{
            color: antiquewhite;
        }

        .btn{
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
    </style>

</head>
<body>
<section class="head">
    <div class="container mb-5">
        <a href="list.php"><h1 class="text-center">Ebooking</h1></a>

        <div style="position: absolute; top: 10px; right: 10px">
            <?php if (isset( $_SESSION["userName"])) { ?>
                <h6 class="text-right"><span>Bienvenido: <?php echo  $_SESSION["userName"] ?></span></h6>
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

<section class="search-box">
    <?php foreach ($hotels as $hotel) { ?>
        <div class="container mb-5 ps-0 border">
            <div class="row">
                <div class="col-md-5">
                    <a href="singleHotel.php?id=<?php echo $hotel->getIdHotel(); ?>">
                        <img class="d-flex align-self-start" src="<?php echo $hotel->getSources()[0]->getUrl(); ?>">
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="singleHotel.php?id=<?php echo $hotel->getIdHotel(); ?>">
                        <h2><?php echo $hotel->getNameHotel(); ?></h2>
                    </a>

                    <div class="media-body pl-3">
                        <p><strong>Tipo: </strong><?php echo $hotel->getStarsHotel(); ?> &#11088;</p>
                        <p><strong>Ciudad: </strong><?php echo $hotel->getCity()->getNameCity(); ?></p>
                        <p><strong>Descripción:</strong> <?php echo $hotel->getDescription(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
</body>
</html>