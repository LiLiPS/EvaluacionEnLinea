<?php
include("../general/conexion.php");

$base = getConexion();

$sql = "INSERT INTO examen_grupo (id_examen, id_grupo, fecha, hora_inicio, hora_fin) VALUES (:id_examen, :id_grupo, :fecha, :hora_inicio, :hora_fin)";

$resultado = $base->prepare($sql);
$resultado->execute(array(":id_examen" => $_POST["examen"], ":id_grupo" => $_POST["grupo"], ":fecha" => $_POST["fecha"], ":hora_inicio" => $_POST["hora_inicio"], ":hora_fin" => $_POST["hora_fin"]));

header("Location:listaAplicaciones.php");
?>