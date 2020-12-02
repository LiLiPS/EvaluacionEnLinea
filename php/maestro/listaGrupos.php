<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
        header("location:../../index.php");
    
        include("listaGrupos_.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Grupos</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="listaGrupos.php">Grupos</a>
            </li>
            <li class="nav-item">
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
        Lista de grupos
    </h1>

    <br><br>
    <?php
        $grupos = getGrupos();
    ?>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Número</th>
            <th scope="col">Nombre</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($grupos as $grupo): ?>
                <tr class="text-center">
                    <td><?php echo $grupo->id_grupo ?></td>
                    <td><?php echo $grupo->nombre ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>