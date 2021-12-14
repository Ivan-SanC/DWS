<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "dbo.php";

$dbo = new dbo();

$email="";
$user="";
$userPass="";
?>

<html>
<head>


</head>
<body>
<form class="formLog" action="registrar.php" method="post" name="signup-form">
    <div class="form-element">
        <label>Email: </label>
        <input type="email" name="email"  />
    </div>
    <div class="form-element">
        <label>Username: </label>
        <input type="text" name="username" required />
    </div>
    <div class="form-element">
        <label>Password: </label>
        <input type="password" name="password"  required />
    </div>
    <button class="boton" type="submit" >Register</button>
</form>
<?php
if (isset($_POST["email"]))


?>
</body>
</html>