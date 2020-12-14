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

    <style type="text/css">
        body {
            background:
            linear-gradient(to bottom, rgba(255,255,255,0.7) 5%,rgba(255,255,255,0.7) 5%),
                url("../../fondo2.jpg")
                no-repeat !important;
            min-height: 100% !important;
            background-size: cover !important;
        }
    </style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Evaluaciones en línea</a>
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
        Bienvenido/a, <?php echo($_SESSION["nombre"]); ?>
    </h1>
    <hr>
    <p class="h4 text-center">Bienvenido a la plataforma de evaluaciones en línea.</p>
    
</div>
</body>
</html>