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
    <script src="../../js/lib.js"></script>
    <title>Examen: <?php echo($nombre); ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Responder examen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <br>

    <div class="container">
        <h1 class="text-center"><?php echo($nombre); ?></h1>
        <hr>
        <h2 class="text-center" id="total"></h2>
        <input id="calificacion_final" value="">
        <form action="guardarPreguntas.php" method="post">
            <input id="id_examen" value="<?php echo($idExamen); ?>">
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
            <?php foreach($preguntas as $pregunta): ?>
                <div class="form-group preguntas">
                    <input class="pk_pregunta" value="<?php echo($pregunta->id_pregunta); ?>">
                    <label for="<?php echo("r_$pregunta->id_pregunta"); ?>">
                        <b><?php echo("$pregunta->pregunta"); ?></b>
                    </label>
                    <input type="text" name="<?php echo("r_$pregunta->id_pregunta"); ?>" id="<?php echo("r_$pregunta->id_pregunta"); ?>" class="form-control pk_resp" required>
                    <img src="../../loading.gif" width="100px" class="carga" id="<?php echo("i_$pregunta->id_pregunta");?>" hidden="">
                    <label id="<?php echo("p_$pregunta->id_pregunta"); ?>" class="p"></label>
                    <br>
                    <label id="<?php echo("c_$pregunta->id_pregunta"); ?>" class="c"></label>
                    <br>
                    <label id="<?php echo("t_$pregunta->id_pregunta"); ?>" class="t"></label> 
                    <input id="<?php echo("palabras_$pregunta->id_pregunta"); ?>" value="" class="palabras_"> 
                    <input class="totales" id="<?php echo("total_p_$pregunta->id_pregunta"); ?>" value=""> 
                </div>
                <hr>
            <?php endforeach; ?>
            <input id="envio" value="0">
            <button type="button" id="boton" class="btn btn-primary">
                    Enviar
            </button>
            <button type="button" id="btn_terminar" class="btn btn-success" hidden="">
                    Terminar
            </button>
        </form>
    </div>
</body>
</html>