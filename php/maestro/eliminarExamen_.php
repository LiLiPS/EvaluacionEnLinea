<?php
    include("../general/conexion.php");

    $base = getConexion();

    $sql = "DELETE from Pregunta WHERE id_examen= :id_examen";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id_examen"=>$_GET["idExamen"]));

    $sql = "DELETE from Examen WHERE id_examen= :id_examen";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id_examen"=>$_GET["idExamen"]));

    header("Location:listaExamenes.php");
?>