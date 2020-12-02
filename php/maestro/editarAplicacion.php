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
    <title>Crear aplicación</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
            <li class="nav-item active">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
            </li>
            <li class="nav-item">
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
        Editar Aplicación
    </h1>
    <br>
    <br>

    <?php
    $examenes = getExamenes();
    $grupos = getGrupos();
    $aplicacion = getAplicacion($_GET['id']);
    ?>

    <form action="editarAplicacion_.php" method="post">
        <input type="hidden" name="id_examen_grupo" id="id_examen_grupo"
               value="<?php echo $aplicacion->id_examen_grupo ?>">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="examen">Seleccione el examen</label>
                    <select id="examen" name="examen" class="form-control" required>
                        <option value=""> - Seleccione una opción - </option>
                        <?php foreach ($examenes as $examen) { ?>
                            <?php $selected = ($examen->id_examen == $aplicacion->id_examen) ? 'selected' : ''; ?>
                            <option value="<?php echo $examen->id_examen ?>" <?php echo $selected?>>
                                <?php echo $examen->nombre ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="grupo">Seleccione el grupo</label>
                    <select id="grupo" name="grupo" class="form-control" required>
                        <option value=""> - Seleccione una opción - </option>
                        <?php foreach ($grupos as $grupo) { ?>
                            <?php $selected2 = ($grupo->id_grupo == $aplicacion->id_grupo) ? 'selected' : ''; ?>
                            <option value="<?php echo $grupo->id_grupo ?>" <?php echo $selected2?>>
                                <?php echo $grupo->nombre ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">
                Guardar examen
            </button>
            <a href="listaAplicaciones.php" class="btn btn-danger">
                Cancelar
            </a>
        </div>
    </form>
</div>
</body>
</html>
