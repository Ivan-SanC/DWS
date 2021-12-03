<?php
include_once "author.php";
include_once "genre.php";
include_once "movie.php";
include_once "dbo.php";

$dbo=new dbo();

if (isset($_GET["id"])) {
    $movie = $dbo->getMovie($_GET["id"]);
} else {
    die("NO ID SELECTED");
}
?>
<html>
<head>


</head>
<body>
<img src="<?php echo $movie->getImgMovie(); ?>" alt="front" width="200" height="300">
<?php
echo "<br>".$movie->getNameMovie() . " (" . $movie->getYearMovie() . ")<br>";
echo "Rating: " . $movie->getRatingMovie() . "<br>";
echo "Duration: ".$movie->getDurationMovie()."<br>";
echo "Director: ".$movie->getAuthor()->getNameAuthor()."<br>";
echo $movie->getDescription()."<br>";
?>
<iframe width="1280" height="720" src="https://www.youtube.com/embed/9vmJTnPxNWM&ab_channel=NetflixEspa%C3%B1a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>




</body>
</html>
