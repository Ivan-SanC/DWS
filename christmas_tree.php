<html lang="es">
<head>
    <title>Christmas tree</title>
</head>
<body>
<form method="post" action="christmas_tree.php">
    <label>
        Number of flats:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function getFila($num){

        for ($i=1; $i <=$num; $i++) {

            for($m=1;$m<=$num-$i;$m++ ){
                echo  " &nbsp";
            }
            for ($a=1; $a<=$i*2-1;$a++){
                echo "*";
            }

            echo "<br>";
        }
    }


    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        echo getFila($num);
    }
    ?>
</div>
</body>
</html>