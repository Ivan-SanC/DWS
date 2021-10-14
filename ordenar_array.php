<html lang="es">
<head>
    <title>Ordenar array</title>

</head>
<body>
<h1>Ordenar array</h1>

<div>

   <?php

       $array = array(2, 1, 3, 5, 4, 5, 6, 0, 8, 7, 9,);

        for ($i=0; $i< count($array)-1; $i++) {
            for ($k =$i+1; $k<count($array); $k++) {
                $valorA = $array[$i];
                $valorB = $array[$k];
                if ($valorA > $valorB) {

                    $array[$i]= $valorB;
                    $array[$k]= $valorA;
                }
            }
    }

    foreach ($array as $valor){
       echo $valor. "<br>";
    }
    ?>
</>
</body>
</html>