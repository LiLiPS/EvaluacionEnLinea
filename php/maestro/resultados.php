<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
        header("location:../../index.php");

    include("resultados_.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Resultados</title>

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
                <a class="nav-link" href="listaGrupos.php">Grupos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
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
        Lista de resultados de exámenes
    </h1>

    <hr>

    <br>
    <?php
        $resultados = getResultados();
    ?>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">No.</th>
            <th scope="col">Número de control</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Resultado</th>
        </tr>
        </thead>
        <tbody>
        <?php if (sizeof($resultados) > 0) { ?>
            <?php $contador = 1; ?>
            <?php foreach($resultados as $resul): ?>
                <tr class="text-center">
                    <td><?php echo $contador ?></td>
                    <td><?php echo $resul->no_control ?></td>
                    <td><?php echo $resul->nombreAlumno ?></td>
                    <td><?php echo $resul->fecha_resultado ?></td>
                    <td><?php echo $resul->resultado ?></td>
                </tr>
                <?php $contador++; ?>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="5" class="text-center">No se encontraron resultados</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>