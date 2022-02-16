<?php

/**
 * @var array $characters
 * @var array $locations ;
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rick</title>
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
<h1>Rick</h1>
<br>


<?php if (!isset($_SESSION["idUser"])) {
    echo "<p><strong>Logea para cambiar Locations </strong><a href='../Controller/loginController.php'>Pincha aqui</a></p>";
}else{
    echo "<p><strong>Welcome ".$_SESSION["mail"]."</strong> </p>";
} ?>
<h2>Characters</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Nanme</th>
        <th>Status</th>
        <th>Specie</th>
        <th>Origin-Type-Dimension</th>
        <th>Location-Type-Dimension</th>
        <th>Episodes</th>
        <?php if (isset($_SESSION["idUser"])) { ?>
            <th>Action</th>
        <?php } ?>

    </tr>
    <?php foreach ($characters as $character) { ?>
        <tr>
            <td><?php echo $character->idCharacter; ?></td>
            <td><?php echo $character->nameCharacter; ?></td>
            <td><?php echo $character->status; ?></td>
            <td><?php echo $character->specie; ?></td>
            <td><?php echo $character->origin->nameLocation . "-" . $character->origin->type . "-" . $character->origin->dimension; ?></td>
            <td><?php echo $character->location->nameLocation . "-" . $character->location->type . "-" . $character->location->dimension; ?></td>
            <td>
                <?php foreach ($character->episodes as $episode) {
                    echo $episode->name . ", " . $episode->episode;
                } ?>
            </td>
            <?php if (isset($_SESSION["idUser"])) { ?>
                <td>
                    <form method="post">
                        <select name="location">
                            <option value='vacio'>Locations</option>
                            <?php foreach ($locations as $location) {
                                echo "<option value=" . $location->idLocation . ">" . $location->nameLocation . "</option>";
                            } ?>
                        </select>
                        <input type="hidden" name="idCharacter" value="<?php echo $character->idCharacter; ?>">
                        <input type="submit"  value="Change"/>

                    </form>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>
<span><a href="../Controller/close.php">Logout</a></span>
</body>
</html>