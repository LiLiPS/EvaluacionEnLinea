<?php 
	include("../general/conexion.php");

	function getResultados()
	{
		$base = getConexion();
	    $consulta = "SELECT examen_grupo.*, examen.nombre, grupo.nombre
					from examen_grupo
					LEFT JOIN examen ON examen.id_examen = examen_grupo.id_examen 
					LEFT JOIN grupo ON grupo.id_grupo = examen_grupo.id_grupo
					where examen_grupo.id_examen_grupo = " . $_GET["id"];
	    
	    $conexion = $base->query($consulta);
	    $datos = $conexion->fetch(PDO::FETCH_OBJ);

	    $consulta = "SELECT alumno_grupo.*, CONCAT(usuario.nombre, ' ', usuario.apellido_paterno, ' ', usuario.apellido_materno) as nombreAlumno, examen_alumno.resultado, usuario.no_control, examen_alumno.fecha as fecha_resultado
					from alumno_grupo 
					LEFT JOIN usuario ON usuario.id_usuario = alumno_grupo.id_usuario
					LEFT JOIN examen_alumno ON examen_alumno.id_usuario = usuario.id_usuario
					WHERE examen_alumno.id_aplicacion = ". $_GET["id"] .
					" GROUP BY alumno_grupo.id_usuario";
	    
	    $conexion = $base->query($consulta);
	    $resultados = $conexion->fetchAll(PDO::FETCH_OBJ);

	    return $resultados;	    
	}


?>