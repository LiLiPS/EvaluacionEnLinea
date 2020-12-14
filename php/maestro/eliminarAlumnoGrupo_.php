<?php
    include("../general/conexion.php");

    $base = getConexion();

    $sql = "DELETE from alumno_grupo WHERE id_usuario= :id_usuario";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id_usuario"=>$_GET["idAlumno"]));

    header("Location:listaAlumnos.php?idGrupo=" . $_GET["idGrupo"]);
?>