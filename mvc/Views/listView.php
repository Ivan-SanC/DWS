<html>
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: cornflowerblue;
        }

        a {
            text-decoration: none
        }
        img{
            width: 270px;
            height: 270px;
        }
    </style>

</head>
<body>
<section class="head">
    <div class="container">
        <h1 class="text-center"><span><a href="list.php">Ebooking</a></span></h1>
    </div>
</section>
<div class="clearfix"></div>
<section class="search-box">
    <?php foreach ($hotels as $hotel) { ?>
        <div class="container p-5 my-5 border">


            <a href="singleHotel.php?id=<?php echo $hotel->getIdHotel(); ?>">
                <h2><?php echo $hotel->getNameHotel(); ?></h2>
            </a>
            <p><?php echo $hotel->getStarsHotel(); ?></p>
            <p><?php echo $hotel->getCity()->getNameCity(); ?></p>
            <p><?php echo $hotel->getDescription(); ?></p>
            <a href="singleHotel.php?id=<?php echo $hotel->getIdHotel(); ?>">
                <img class="d-flex align-self-start" src="<?php echo $hotel->getSources()[0]->getUrl(); ?>">
            </a>

        </div>
    <?php } ?>

</section>
</body>
</html>