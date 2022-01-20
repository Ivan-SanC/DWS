<?php

session_start();


?>

<html>
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-image: linear-gradient(to right bottom, rgba(36, 95, 221, 0.42) 10%, #5653b7 90%)
        }

        a {
            text-decoration: none
        }

        img {
            width: 420px;
            height: 310px;
        }
        h1, h2, a{
            color: #111111;
        }

    </style>

</head>
<body>
<section class="head">
    <div class="container mb-5">
        <a href="list.php"><h1 class="text-center">Ebooking</h1></a>
    </div>
</section>
<div class="container mx-auto mt-4 custom">
    <h3>Registro</h3>
    <form class="formReg" action="register.php" method="post">
        <div class="form-element">
            <label>Email: </label>
            <input type="email" name="email" required/>
        </div>
        <div class="form-element">
            <label>Username: </label>
            <input type="text" name="username" pattern="[\S.]+" required/>
        </div>
        <div class="form-element">
            <label>Password: </label>
            <input type="password" name="password" pattern="[\S.]+" required/>
        </div>
        <button class="boton" type="submit">Registrar</button>
    </form>
    <p>Tienes cuenta? <a href="login.php">Entra aquí</a></p>
</div>
</body>
</html>