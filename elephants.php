<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){
    //TODO: Return an array of elephants sorted by it's number (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.
    // number  name species

    //Bucle for que recorre  $elephants y compara las rows

    for($fila=0;$fila<count($elephants)-1;$fila++){

        for($fila2=$fila+1;$fila2<count($elephants);$fila2++){
            $valorA=$elephants[$fila];
            $valorB=$elephants[$fila2];

            //le indicamos que compare la fila y la columna específica
            if ($elephants[$fila]["number"]>$elephants[$fila2]["number"]){
                $elephants[$fila]=$valorB;
                $elephants[$fila2]=$valorA;

            }
        }
    }
    //return devuelve un valor
    return $elephants;
}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Elephants (<?php echo count($elephants) ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //creamos un array nuevo que tendra $elephants ordenados por medio de la funcion
    $sorted_Elephants=getSortedElephantsByNumber($elephants);

    //creamos un bucle para completar la tabla
    for($x=0;$x<count($elephants);$x++){
        echo "<tr>";
        echo "<th>";

        //escribimos lo que queremos ver sin ordenar
        echo $elephants[$x]["number"];
        echo "</th>";
        echo "<th>";
        echo $elephants[$x]["name"];
        echo "</th>";
        echo "<th>";
        echo $elephants[$x]["species"];
        echo "</th>";
        echo "<th>";

        //mostramos los datos ordenados
        echo $sorted_Elephants[$x]["number"];
        echo "</th>";
        echo "<th>";
        echo $sorted_Elephants[$x]["name"];
        echo "</th>";
        echo "<th>";
        echo $sorted_Elephants[$x]["species"];
        echo "</th>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>