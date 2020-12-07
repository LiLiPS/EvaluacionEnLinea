<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../index.php");

    include("../general/conexion.php");
    $base = getConexion();
    $conexion = $base->query("SELECT * FROM vista_alumno_grupo");
    $resultado = $conexion->fetch(PDO::FETCH_ASSOC);
    $idGrupo = $resultado["id_grupo"];

    $conexion = $base->query("SELECT * FROM vista_examen_grupo WHERE id_grupo = $idGrupo");
    $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido/a, <?php echo($_SESSION["nombre_alumno"]); ?></title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Proyecto IA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Opción 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Opción 2</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Opción 3</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Bienvenido/a, <?php echo($_SESSION["nombre_alumno"]); ?>
    </h1>

    <br>
    <div class="row text-center">
        <div class="col">
            <button class="btn btn-link">Regresar</button>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-outline-primary" href="form.php">
                Crear
            </a>
        </div>
    </div>

    <br><br>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Examen</th>
            <th scope="col">+</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($examenes as $examen): ?>
                <tr>
                    <th scope="row"><?php echo($examen->id_examen); ?></th>
                    <td><?php echo($examen->nombre); ?></td>
                    <td><a href="responderExamen.php?idExamen=<?php echo($examen->id_examen);?>&nombre=<?php echo($examen->nombre);?>">Contestar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>