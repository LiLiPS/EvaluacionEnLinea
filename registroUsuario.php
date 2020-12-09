<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto IA</title>

    <link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>
<div id="login" >
    <h3 class="text-center text-white pt-5">Registro</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12" style="height: 620px !important;">
                    <form id="login-form" class="form" action="php/general/registrar.php" method="post">
                        <h3 class="text-center text-info">Registra tus datos</h3>
                        <div class="form-group">
                            <label for="nombre" class="text-info">Nombre:</label><br>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="apellido_paterno" class="text-info">Apellido Paterno:</label><br>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="apellido_materno" class="text-info">Apellido Materno:</label><br>
                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_control" class="text-info">No. control:</label><br>
                            <input type="text" name="no_control" id="no_control" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="usuario" class="text-info">Usuario:</label><br>
                            <input type="text" name="usuario" id="usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="psw" class="text-info">Contraseña:</label><br>
                            <input type="password" name="psw" id="psw" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Registrar">
                            <a href="index.php" class="btn btn-danger btn-md">Cancelar</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>