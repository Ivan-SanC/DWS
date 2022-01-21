<html>
<head>
    <title>Ebooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <style>

        :root {
            --gradient: linear-gradient(to left top, #1b2354 10%, #3d3c6b 90%) !important;
        }

        body {
            margin: 50px auto;
            text-align: center;
            width: 800px;
            background-image: linear-gradient(to right bottom, rgba(36, 95, 221, 0.42) 10%, #5653b7 90%)!important;
        }

        .boton, .formLog {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: antiquewhite;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .boton:hover, .boton:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: antiquewhite !important;
            border: 5px solid #5653b7 !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: none;
        }

        .custom {
            padding-top: 100px;
        }

        h1 {
            margin-top: 10px;
            font-size: 70px;
            color: antiquewhite;
            text-align: center;
            text-transform: none;
        }

        h3 {
            text-align: center;
            padding-bottom: 5px;
            color: antiquewhite;
        }


        a {
            text-decoration: none;
            color: black;
        }

        p {
            color: antiquewhite
        }


        /*log*/

        label {
            width: 150px;
            display: inline-block;
            font-size: 1.5rem;
            font-family: 'Lato';

        }

        input {
            font-size: 1.5rem;
            font-weight: 100;
            font-family: 'Lato';
            background: #222;
            padding: 10px;
            border: 5px solid;
            border-image-slice: 1;
            -webkit-background-clip: text !important;
            border-image-source: var(--gradient) !important;
        }

        form {
            margin: 25px auto;
            padding: 20px;
            width: 500px;

        }

        div.form-element {
            margin: 20px 0;
        }

        button {
            padding: 10px;
            font-size: 1.5rem;
            font-family: 'Lato';
            font-weight: 100;
        }

    </style>

</head>
<body>
<a href="list.php">
    <h1>Ebooking</h1>
</a>
<div class="container mx-auto mt-4 custom">
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
        <button class="boton" type="submit" name="login" value="login">Log In</button>
    </form>
</div>
<p>No tienes cuenta?<a href="registrar.php"> Registrate aquí</a></p>

</body>
</html>