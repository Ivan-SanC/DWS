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
<div style="background-color: skyblue; display: inline-block;">

    <?php
    function getFila($num){

        for ($i=1; $i <=$num; $i++) {

            for($m=1;$m<=$num-$i;$m++ ){
                echo '<span style="color: skyblue">*</span>';
            }
            for ($a=1; $a<=$i*2-1;$a++){
                echo '<span style="color: forestgreen">*</span>';
            }
            for($m=1;$m<=$num-$i;$m++ ){
                echo  '<span style="color: skyblue">*</span>';
            }
            echo "<br>";
        }
    }


    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        echo getFila($num);
    }
    ?>
</>
</body>
</html>