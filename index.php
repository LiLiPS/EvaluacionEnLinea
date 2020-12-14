<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluaciones en línea</title>

    <link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <style type="text/css">
        body {
            background:
            linear-gradient(to bottom, rgba(255,255,255,0.7) 5%,rgba(255,255,255,0.7) 5%),
                url("fondo2.jpg")
                no-repeat;
            min-height: 100%;
            background-size: cover;
        }
    </style>

</head>

<body>
<div id="login">
    <br>
    <div class="container">
        <h1 id="titulo" class="text-center">Plataforma de evaluaciones en línea</h1>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="php/general/login.php" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="usuario" class="text-info">Username:</label><br>
                            <input type="text" name="usuario" id="usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass" class="text-info">Password:</label><br>
                            <input type="password" name="pass" id="pass" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Ingresar">
                        </div>
                        <br>
                        <div id="register-link" class="text-right">
                            <a href="registroUsuario.php" class="text-info">Regístrate</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>