<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
        header("location:../../index.php");
    
        include("listaAlumnos_.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Lista de Alumnos</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="listaGrupos.php">Grupos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
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
        Lista de alumnos
    </h1>
    <hr>
    <?php
        $todos = getAllAlumnos();
    ?>
    <div class="row">
        <div class="col col-lg-6">
            <form class="form-inline" action='alumnoGrupo_.php' method='post'>
                <input type="hidden" name="id_grupo" id="id_grupo" value="<?php echo $_GET["idGrupo"]?>">
                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="alumno" id="alumno">
                        <option value="0">- Seleccione un alumno -</option>
                        <?php foreach($todos as $al): ?>
                            <option value="<?php echo $al->id_usuario ?>"><?php echo $al->no_control ." - ". $al->nombre ." ". $al->apellido_paterno ." ". $al->apellido_materno?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type='submit' name='buscar' value='Agregar alumno'
                    class="btn btn-primary btn-outline-primary mb-2">
            </form>
        </div>
        <div class="col col-lg-3"></div>
    </div>
    <br>

    <br>
    <?php
        $alumnos = getAlumnos();
    ?>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Número de control</th>
            <th scope="col">Nombre</th>
            <th scope="col">Operaciones</th>
        </tr>
        </thead>
        <tbody>
            <?php if (sizeof($alumnos) > 0) { ?>
            <?php foreach($alumnos as $alumno): ?>
                <tr class="text-center">
                    <td><?php echo $alumno->no_control ?></td>
                    <td><?php echo $alumno->nombre ." ". $alumno->apellido_paterno ." ". $alumno->apellido_materno?></td>
                    <td>
                        <a class="btn btn-danger" href="eliminarAlumnoGrupo_.php?idAlumno=<?php echo($alumno->id_usuario);?>&idGrupo=<?php echo($alumno->id_grupo);?>">
                        <i class="fas fa fa-trash"></i> 
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php } else { ?>
            <tr>
                <td colspan="3" class="text-center">No se encontraron alumnos</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>