<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "dbo.php";

$dbo = new dbo();


?>

<html>
<head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            margin: 50px auto;
            text-align: center;
            width: 800px;
        }

        h1 {
            font-family: 'Passion One';
            font-size: 2rem;
            text-transform: uppercase;
        }

        label {
            width: 150px;
            display: inline-block;
            text-align: left;
            font-size: 1.5rem;
            font-family: 'Lato';
        }

        input {
            border: 2px solid #ccc;
            font-size: 1.5rem;
            font-weight: 100;
            font-family: 'Lato';
            padding: 10px;
        }

        form {
            margin: 25px auto;
            padding: 20px;
            border: 5px solid #ccc;
            width: 500px;
            background: #eee;
        }

        div.form-element {
            margin: 20px 0;
        }

        button {
            padding: 10px;
            font-size: 1.5rem;
            font-family: 'Lato';
            font-weight: 100;
            background: yellowgreen;
            color: white;
            border: none;
        }

        p.success,
        p.error {
            color: white;
            font-family: lato;
            background: yellowgreen;
            display: inline-block;
            padding: 2px 10px;
        }

        p.error {
            background: orangered;
        }
    </style>

</head>
<body>

<h3>Registro</h3>
<form class="formReg" action="registrar.php" method="post">
    <div class="form-element">
        <label>Email: </label>
        <input type="email" name="email" required/>
    </div>
    <div class="form-element">
        <label>Username: </label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required/>
    </div>
    <div class="form-element">
        <label>Password: </label>
        <input type="password" name="password" required/>
    </div>
    <button class="boton" type="submit">Register</button>
</form>

<h3>Login</h3>
<form class="formLog" method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required/>
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required/>
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>

<?php
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $userPass = crypt($pass);
    $registrar = $dbo->registrarUser($user, $userPass, $email);
}
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

if (isset($_POST["username"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $login=$dbo->getUser($user,$pass);
}

?>
</body>
</html>