<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../index.php");

    date_default_timezone_set ("America/Monterrey");

    include("listaExamenes_.php");
    $examenes = getExamenes();
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido/a, <?php echo($_SESSION["nombre"]); ?> </title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio.php">Evaluaciones en línea</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaResultados.php">Resultados</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Lista de exámenes
    </h1>
    <hr>
    <p class="h5 text-center">A continuación, se muestra la lista de exámenes que puedes responer.</p>
    <br><br>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">No.</th>
            <th scope="col">Grupo</th>
            <th scope="col">Examen</th>
            <th scope="col">Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php $contador = 1; foreach($examenes as $examen): ?>                
                <tr class="text-center">
                    <th scope="row"><?php echo $contador++; ?></th>
                    <td><?php echo $examen->nombreGrupo; ?></td>
                    <td><?php echo($examen->nombreExamen); ?></td>
                    <td>
                        <?php if($examen->resultado == null) {?>
                        <a class="btn btn-primary" href="responderExamen.php?idExamen=<?php echo($examen->id_examen);?>&nombre=<?php echo($examen->nombreExamen);?>&aplicacion=<?php echo($examen->id_examen_grupo);?>">Contestar</a>
                        <?php }else { 
                            echo $examen->resultado;
                         } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>