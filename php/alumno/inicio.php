<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../index.php");

    include("../general/conexion.php");
    $base = getConexion();
    $consulta = "SELECT examen_grupo.*, grupo.id_grupo, grupo.nombre as nombreGrupo, examen.id_examen, examen.nombre as nombreExamen, alumno_grupo.id_usuario from examen_grupo 
                LEFT JOIN grupo ON examen_grupo.id_grupo = grupo.id_grupo
                LEFT JOIN alumno_grupo ON grupo.id_grupo = alumno_grupo.id_grupo
                LEFT JOIN examen ON examen_grupo.id_examen = examen.id_examen WHERE alumno_grupo.id_usuario = " . $_SESSION["id_usuario"];
    
    $conexion = $base->query($consulta);
    $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido/a, <?php echo($_SESSION["nombre"]); ?></title>

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
            <li class="nav-item ">
                <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Bienvenido/a, <?php echo($_SESSION["nombre"]); ?>
    </h1>

    <br>

    <br><br>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Grupo</th>
            <th scope="col">Examen</th>
            <th scope="col">Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($examenes as $examen): ?>                
                <tr>
                    <th scope="row"><?php echo($examen->id_examen); ?></th>
                    <td><?php echo $examen->nombreGrupo; ?></td>
                    <td><?php echo($examen->nombreExamen); ?></td>
                    <td><a href="responderExamen.php?idExamen=<?php echo($examen->id_examen);?>&nombre=<?php echo($examen->nombreExamen);?>">Contestar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>