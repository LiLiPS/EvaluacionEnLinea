<?php 
    session_start();
    include("../general/conexion.php");

    $base = getConexion();
    $idExamen = $_POST["idExamen"];
    $idUsuario = $_SESSION["id_usuario"];
    $calificacion = $_POST["resultado_final"];

    $insertResultado = "INSERT INTO examen_alumno (id_examen, id_usuario, fecha, resultado) VALUES (:idE, :idU, :fecha, :resultado)";
    $resultado = $base->prepare($insertResultado);
    $resultado->execute(array(":idE"=>$idExamen, ":idU"=>$idUsuario, ":fecha"=>date('Y-m-d'), ":resultado"=>$calificacion));
?>