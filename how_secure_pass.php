<html lang="es">
<head>
    <title>How secure is your password</title>
    <style>
        h1{text-align: center;}
        form {text-align: center;}
        p{text-align: center; font-size: 20px;}

    </style>
</head>
<body>
<h1>How Secures Is My Password?</h1>

<form method="post" action="how_secure_pass.php">
    <label>
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

            //menos de 1 sec
        if (getTime($pass)<=1 || mostUsed($pass)){
            echo '<body style="background-color:darkred">';
            echo "<p>Contraseña muy fácil</p>";

            //menos de 1 mes
        }elseif (getTime($pass)<=2.628e+6){
            echo '<body style="background-color:orange">';
            echo "<p>Contraseña media</p>";

            //mas de 1 mes menos de 1 año
        }elseif (getTime($pass)>2.628e+6 && getTime($pass)<=3.154e+9){
            echo '<body style="background-color:cornflowerblue">';
            echo "<p>Contraseña dificil</p>";

            //mas de 1 año
        }else{
            //verde
            echo '<body style="background-color:forestgreen">';
            echo "<p>Constraseña muy dificil</p>";
        }

    }

    function mostUsed($pass){
        $array=array("12345","123456789", "qwerty", "password", "12345",
            "qwerty123", "1q2w3e", "12345678","111111","1234567890" );

        if (in_array($pass,$array)){
            echo "<p>Esta contraseña está en el top 10</p>";
            return true;
        }
        return false;

    }

    if (isset($_POST["pass"])) {
        $pass = $_POST["pass"];
        getColor($pass);



    }
    ?>
</>
</body>
</html>
