<html lang="es">
<head>
    <title>How secure is your password</title>
    <style>
        form {text-align: center;}

    </style>
</head>
<body>
<form method="post" action="how_secure_pass.php">
    <label>
        <h1>How Secures Is My Password?</h1>
        <br>
        <input type="password" name="pass"/>
    </label>
    <input type="submit"/>
</form>
<div>

    <?php
    function getTime($pass){
        //256^ a longitud
        //1 procesador hace 1000 combinaciones por segundo
        $ascii=256;
        $total=pow($ascii, strlen($pass));
        return $total/1000;
    }

    function getColor($pass){
        if (getTime($pass)<=1){
            //rojo
            echo '<body style="background-color:darkred">';
        }elseif (getTime($pass)>1 && getTime($pass)<=2.628e+6){
            //amarillo
            echo '<body style="background-color:orange">';
        }elseif (getTime($pass)>2.628e+6 && getTime($pass)<=3.154e+9){
            //azul
            echo '<body style="background-color:cornflowerblue">';
        }else{
            //verde
            echo '<body style="background-color:darkslategrey">';
        }

    }


    if (isset($_POST["pass"])) {
        $pass = $_POST["pass"];
        getColor($pass);



    }
    ?>
</>
</body>
</html>
