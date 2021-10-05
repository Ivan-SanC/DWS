<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfects.php">
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

        for($i=1; $i<$num; $i++){

            if($num % $i == 0){
                $divisors[]=$i;
            }

        }
        return $divisors;
    }

    function isPerfectNum($num){

        if(array_sum(getDivisors($num))==$num){
            return true;
        }else{
            return  false;
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        $i=0;
        $j=1;
        while($i<$num){
            if (isPerfectNum($j)) {
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