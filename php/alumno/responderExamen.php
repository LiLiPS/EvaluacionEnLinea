<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../index.php");

    $idExamen = $_GET["idExamen"];
    $nombre = $_GET["nombre"];

    include("../general/conexion.php");
    $base = getConexion();
    $conexion = $base->query("SELECT * FROM pregunta WHERE id_examen = $idExamen");
    $preguntas = $conexion->fetchAll(PDO::FETCH_OBJ);
    $pks = "";
    $i = 0; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <title>Examen: <?php echo($nombre); ?></title>
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
                    <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <div class="container">
        <h1 class="text-center"><?php echo($nombre); ?></h1>
        <hr>
        <form action="guardarPreguntas.php" method="post">
            <input type="hidden" name="id_examen" value="<?php echo($idExamen); ?>">
            <?php 
                foreach($preguntas as $pregunta):
                    if($i == sizeof($preguntas)-1){
                        $pks = $pks . $pregunta->id_pregunta;
                    }else{
                        $pks = $pks . "$pregunta->id_pregunta" . ",";
                    }
                    $i++;
                endforeach; 
            ?>
            <input type="hidden" name="pks" id="pks" value="<?php echo($pks); ?>">
            <?php foreach($preguntas as $pregunta): ?>
                <div class="form-group">
                    <label for="<?php echo("r_$pregunta->id_pregunta"); ?>"><?php echo("$pregunta->pregunta"); ?></label>
                    <input type="text" name="<?php echo("r_$pregunta->id_pregunta"); ?>" id="<?php echo("r_$pregunta->id_pregunta"); ?>" class="form-control" required>                
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-success">
                    Enviar
            </button>
        </form>
    </div>
</body>
</html>