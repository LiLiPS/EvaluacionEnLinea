<?php
    include("../general/conexion.php");

    $base = getConexion();
    $idGrupo = $_POST["id_grupo"];
    $idAlumno = $_POST["alumno"];


    $sql = "INSERT INTO alumno_grupo (id_usuario, id_grupo) VALUES (:usuario, :grupo)";

    $resultado = $base->prepare($sql);
    $resultado->execute(array(":usuario"=>$idAlumno, ":grupo"=>$idGrupo));


    header("Location:listaAlumnos.php?idGrupo=" . $idGrupo);
?>