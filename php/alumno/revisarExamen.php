<?php 
    session_start();
    include("../general/conexion.php");

    date_default_timezone_set ("America/Monterrey");

    $base = getConexion();
    $idExamen = $_POST["idExamen"];
    $idUsuario = $_SESSION["id_usuario"];
    $calificacion = $_POST["resultado_final"];
    $aplicacion = $_POST["id_aplicacion"];

    $insertResultado = "INSERT INTO examen_alumno (id_aplicacion, id_examen, id_usuario, fecha, resultado) VALUES (:idA, :idE, :idU, :fecha, :resultado)";
    $resultado = $base->prepare($insertResultado);
    $resultado->execute(array(":idA"=>$aplicacion, ":idE"=>$idExamen, ":idU"=>$idUsuario, ":fecha"=>date('Y-m-d H:i:s'), ":resultado"=>$calificacion));
?>