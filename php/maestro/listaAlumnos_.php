<?php
    include("../general/conexion.php");

    function getAlumnos(){
        $base = getConexion();
        $instruccion = "SELECT usuario.id_usuario, usuario.no_control, usuario.nombre, usuario.apellido_paterno, usuario.apellido_materno, grupo.id_grupo FROM usuario LEFT JOIN alumno_grupo ON usuario.id_usuario = alumno_grupo.id_usuario LEFT JOIN grupo ON alumno_grupo.id_grupo = grupo.id_grupo WHERE alumno_grupo.id_grupo = ". $_GET["idGrupo"];
        $conexion = $base->query($instruccion);
        $alumnos = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $alumnos;
    }

    function getAllAlumnos(){
    	$base = getConexion();
        $instruccion = "SELECT usuario.id_usuario, usuario.no_control, usuario.nombre, usuario.apellido_paterno, usuario.apellido_materno from usuario LEFT JOIN rol ON usuario.id_rol = rol.id_rol WHERE usuario.id_rol = 2";
        $conexion = $base->query($instruccion);
        $todos = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $todos;
    }
?>