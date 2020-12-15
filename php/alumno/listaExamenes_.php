<?php 
	date_default_timezone_set ("America/Monterrey");

    include("../general/conexion.php");

    function getExamenes(){
    	$base = getConexion();
	    $consulta = "SELECT examen_grupo.*, grupo.id_grupo, grupo.nombre as nombreGrupo, examen.id_examen, examen.nombre as nombreExamen, alumno_grupo.id_usuario, 
					(select resultado from examen_alumno where examen_alumno.id_usuario = alumno_grupo.id_usuario AND examen_alumno.id_examen = examen.id_examen AND examen_alumno.id_aplicacion = examen_grupo.id_examen_grupo) as resultado 
					from examen_grupo 
	                LEFT JOIN grupo ON examen_grupo.id_grupo = grupo.id_grupo
	                LEFT JOIN alumno_grupo ON grupo.id_grupo = alumno_grupo.id_grupo
	                LEFT JOIN examen ON examen_grupo.id_examen = examen.id_examen
	                WHERE alumno_grupo.id_usuario = " . $_SESSION["id_usuario"] . " AND examen_grupo.fecha = '". date('Y-m-d') ."' AND examen_grupo.hora_inicio <= '". date('H:i:s') ."' AND examen_grupo.hora_fin >= '". date('H:i:s') ."'";
	    
	    $conexion = $base->query($consulta);
	    $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);

	    return $examenes;
    }

    function getResultados(){
    	$base = getConexion();
	    $consulta = "SELECT examen_grupo.*, grupo.id_grupo, grupo.nombre as nombreGrupo, examen.id_examen, examen.nombre as nombreExamen, alumno_grupo.id_usuario, 
					(select resultado from examen_alumno where examen_alumno.id_usuario = alumno_grupo.id_usuario AND examen_alumno.id_examen = examen.id_examen AND examen_alumno.id_aplicacion = examen_grupo.id_examen_grupo) as resultado 
					from examen_grupo 
	                LEFT JOIN grupo ON examen_grupo.id_grupo = grupo.id_grupo
	                LEFT JOIN alumno_grupo ON grupo.id_grupo = alumno_grupo.id_grupo
	                LEFT JOIN examen ON examen_grupo.id_examen = examen.id_examen
	                WHERE alumno_grupo.id_usuario = " . $_SESSION["id_usuario"];
	    
	    $conexion = $base->query($consulta);
	    $resultados = $conexion->fetchAll(PDO::FETCH_OBJ);

	    return $resultados;
    }
    

 ?>