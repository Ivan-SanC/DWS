<?php
/**
 * @var array $myCountries;
 * @var array $otherCountries;
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>World Game</title>
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
<h1>Countries</h1>
<br>
<h2>My countries</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
    </tr>
    <?php foreach ($myCountries as $myCountry){ ?>
        <tr>
            <td><?php echo $myCountry->getCode(); ?></td>
            <td><?php echo $myCountry->getName();?></td>
            <td><?php echo $myCountry->getPopulation();?></td>
            <td><?php echo $myCountry->getGnp();?></td>
            <td><?php echo $myCountry->getNumLang();?></td>
            <td><?php echo $myCountry->getNumCities();?></td>
            <td><?php echo $myCountry->getUser()->getMail();?></td>
        </tr>
    <?php } ?>
</table>
<br>
<h2>Other countries</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
    <?php foreach ($otherCountries as $otherCountry){ ?>
        <tr>
            <td><?php echo $otherCountry->getCode(); ?></td>
            <td><?php echo $otherCountry->getName();?></td>
            <td><?php echo $otherCountry->getPopulation();?></td>
            <td><?php echo $otherCountry->getGnp();?></td>
            <td><?php echo $otherCountry->getNumLang();?></td>
            <td><?php echo $otherCountry->getNumCities();?></td>
            <td><?php echo $otherCountry->getUser()->getMail();?></td>
            <td><a href="?action=attack&countryCode=<?php echo $otherCountry->getCode(); ?>">Attack</a></td>
        </tr>
    <?php } ?>
</table>
<span><a href="../Controllers/logoutController.php">Logout</a></span>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>