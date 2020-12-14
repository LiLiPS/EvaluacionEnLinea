<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../index.php");

    date_default_timezone_set ("America/Monterrey");

    include("listaExamenes_.php");
    $resultados = getResultados();
    
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
            <li class="nav-item">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
            </li>
            <li class="nav-item active">
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
        Resultados
    </h1>
    <hr>
    <br>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">No.</th>
            <th scope="col">Grupo</th>
            <th scope="col">Examen</th>
            <th scope="col">Resultado</th>
        </tr>
        </thead>
        <tbody>
            <?php $contador = 1; foreach($resultados as $resulta): ?>  
                <?php if($resulta->resultado != null) {?>              
                    <tr class="text-center">
                        <th scope="row"><?php echo $contador++; ?></th>
                        <td><?php echo $resulta->nombreGrupo; ?></td>
                        <td><?php echo $resulta->nombreExamen; ?></td>
                        <td><?php echo $resulta->resultado; ?></td>  
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>