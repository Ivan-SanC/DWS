<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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
        h1, h2, a{
            color: #111111;
        }

    </style>

</head>
<body>
<section class="head">
    <div class="container mb-5">
        <a href="list.php"><h1 class="text-center">Ebooking</h1></a>
    </div>
</section>

<section class="search-box">
    <?php foreach ($hotels as $hotel) { ?>
        <div class="container mb-5 border">
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