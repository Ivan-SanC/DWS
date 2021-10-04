<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="find_n_primes.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php

    function getDivisors($num){

        $divisors=array();

        for($i=1; $i<=$num; $i++){

            if($num % $i == 0){
                $divisors[]=$i;
            }

        }
        return $divisors;
    }

    function isPrimeNum($num){
        $total=count(getDivisors($num));
        if($total==2){
            return true;
        }else{
            return false;
        }
        //es lo mismo que lo de arriba
        //return count(getDivisors($num))==2;

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        //$i incrementa si el valor es true y es el que el hace que el bucle acabe cuando se consiguen los x primos
        $i=1;

        //$j es la variable que ira sumando buscando los numeros primos
        $j=0;
        while($i<=$num){
            if (isPrimeNum($j)) {
                echo $j . "<br/>";
                $i++;

            }
            $j++;
        }
    }
    ?>
</div>
</body>
</html>
