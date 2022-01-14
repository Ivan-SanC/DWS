<html>
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="head">
    <div class="container">
        <h1 class="text-center"><span><a href="list.php">Mallorcasa</a></span></h1>
    </div>
</section>
<div class="clearfix"></div>
<section class="search-box">
    <div class="container p-5 my-5 ">


        <h1><?php echo $hotel->getNameHotel(); ?> <span><?php echo $hotel->getStarsHotel(); ?></span></h1>


        <p><?php echo $hotel->getNeighbor()->getNameNeighbor() . ", " . $hotel->getNeighbor()->getZip() . ", "
                . $hotel->getCity()->getNameCity() . ", " . $hotel->getState()->getNameState() . ", " . $hotel->getCountry()->getNameCountry() . "."; ?></p>
        <p><?php echo $hotel->getDescription(); ?></p>

        <p>
            <?php foreach ($hotel->getServices() as $hService) { ?>
                <?php echo $hService->getNameService(); ?>
            <?php } ?>
        </p>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($hotel->getSources() as $image) { ?>
                    <div class="carousel-item <?php echo($hotel->getSources()[0]->getIdHotel() == $image->getIdHotel() ? "active" : "") ?>">
                        <img src="<?php echo $image->getUrl() ?>"
                             class="d-block w-100"
                             alt="13850">
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

</section>
</body>
</html>