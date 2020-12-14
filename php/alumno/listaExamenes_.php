<?php 
	date_default_timezone_set ("America/Monterrey");

    include("../general/conexion.php");

    function getExamenes(){
    	$base = getConexion();
	    $consulta = "SELECT examen_grupo.*, grupo.id_grupo, grupo.nombre as nombreGrupo, examen.id_examen, examen.nombre as nombreExamen, alumno_grupo.id_usuario, resultado from examen_grupo 
	                LEFT JOIN grupo ON examen_grupo.id_grupo = grupo.id_grupo
	                LEFT JOIN alumno_grupo ON grupo.id_grupo = alumno_grupo.id_grupo
	                LEFT JOIN examen ON examen_grupo.id_examen = examen.id_examen 
	                LEFT JOIN examen_alumno ON examen.id_examen = examen_alumno.id_examen
	                WHERE alumno_grupo.id_usuario = " . $_SESSION["id_usuario"] . " AND examen_grupo.fecha = '". date('Y-m-d') ."' AND examen_grupo.hora_inicio <= '". date('H:i:s') ."' AND examen_grupo.hora_fin >= '". date('H:i:s') ."'";
	    
	    $conexion = $base->query($consulta);
	    $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);

	    return $examenes;
    }

    function getResultados(){
    	$base = getConexion();
	    $consulta = "SELECT examen_grupo.*, grupo.id_grupo, grupo.nombre as nombreGrupo, examen.id_examen, examen.nombre as nombreExamen, alumno_grupo.id_usuario, resultado from examen_grupo 
	                LEFT JOIN grupo ON examen_grupo.id_grupo = grupo.id_grupo
	                LEFT JOIN alumno_grupo ON grupo.id_grupo = alumno_grupo.id_grupo
	                LEFT JOIN examen ON examen_grupo.id_examen = examen.id_examen 
	                LEFT JOIN examen_alumno ON examen.id_examen = examen_alumno.id_examen
	                WHERE alumno_grupo.id_usuario = " . $_SESSION["id_usuario"];
	    
	    $conexion = $base->query($consulta);
	    $resultados = $conexion->fetchAll(PDO::FETCH_OBJ);

	    return $resultados;
    }
    

 ?>