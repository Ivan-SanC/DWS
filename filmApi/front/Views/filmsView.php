<?php

/**
 * @var array $availableFilms
 * @var array $userFilms
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sakila</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Sakila</h1>
<br>
<?php if (isset($_SESSION["idUser"]) && count($userFilms) > 0) { ?>
    <h2>My rented films</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Release year</th>
            <th>Language</th>
            <th>Length</th>
            <th>Rating</th>
            <th>Actors</th>
            <th>Categories</th>
            <th>Return</th>
        </tr>
        <?php foreach ($userFilms as $film) { ?>
            <tr>
                <td><?php echo $film->id; ?></td>
                <td><?php echo $film->title; ?></td>
                <td><?php echo $film->description; ?></td>
                <td><?php echo $film->releaseYear; ?></td>
                <td><?php echo $film->language->name; ?></td>
                <td><?php echo $film->length; ?></td>
                <td><?php echo $film->rating; ?></td>
                <td>
                    <?php foreach ($film->actors as $actor) {
                        echo $actor->firstName . " " . $actor->lastName . ", ";
                    } ?>
                </td>
                <td>
                    <?php foreach ($film->categories as $category) {
                        echo $category->name . ", ";
                    } ?>
                </td>
                <td><a href="?action=return&filmId=<?php echo $film->id; ?>">Return</a></td>
            </tr>
        <?php } ?>
    </table>
    <br>
<?php } ?>
<h2>Other films</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Release year</th>
        <th>Language</th>
        <th>Length</th>
        <th>Rating</th>
        <th>Actors</th>
        <th>Categories</th>
        <th>Rent</th>
    </tr>
    <?php foreach ($availableFilms as $film) { ?>
        <tr>
            <td><?php echo $film->id; ?></td>
            <td><?php echo $film->title; ?></td>
            <td><?php echo $film->description; ?></td>
            <td><?php echo $film->releaseYear; ?></td>
            <td><?php echo $film->language->name; ?></td>
            <td><?php echo $film->length; ?></td>
            <td><?php echo $film->rating; ?></td>
            <td>
                <?php foreach ($film->actors as $actor) {
                    echo $actor->firstName . " " . $actor->lastName . ", ";
                } ?>
            </td>
            <td>
                <?php foreach ($film->categories as $category) {
                    echo $category->name . ", ";
                } ?>
            </td>
            <td><a href="?action=rent&filmId=<?php echo $film->id; ?>">Rent</a></td>
        </tr>
    <?php } ?>
</table>
<span><a href="../Controllers/close.php">Logout</a></span>
</body>
</html>