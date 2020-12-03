<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
        header("location:../../index.php");

    include("listaAplicaciones_.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Aplicaciones</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaGrupos.php">Grupos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="listaAplicaciones.php">Aplicaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Lista de aplicaciones de exámenes
    </h1>

    <br>
    <div class="row text-center">
        <div class="col">
            <a class="btn btn-primary btn-outline-primary" href="crearAplicacion.php">
                Crear
            </a>
        </div>
    </div>

    <br><br>
    <?php
        $aplicaciones = getAplicaciones();
    ?>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Número</th>
            <th scope="col">Examen</th>
            <th scope="col">Grupo</th>
            <th scope="col">Operaciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if (sizeof($aplicaciones) > 0) { ?>
            <?php $contador = 1; ?>
            <?php foreach($aplicaciones as $aplicacion): ?>
                <tr class="text-center">
                    <td><?php echo $contador ?></td>
                    <td><?php echo $aplicacion->examen ?></td>
                    <td><?php echo $aplicacion->grupo ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="editarAplicacion.php?id=<?php echo $aplicacion->id_examen_grupo?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" href="eliminarAplicacion_.php?id=<?php echo $aplicacion->id_examen_grupo?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $contador++; ?>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="4" class="text-center">No se encontraron aplicaciones</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>