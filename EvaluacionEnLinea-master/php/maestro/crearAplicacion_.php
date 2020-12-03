<?php
include("../general/conexion.php");

$base = getConexion();

$sql = "INSERT INTO examen_grupo (id_examen, id_grupo) VALUES (:id_examen, :id_grupo)";

$resultado = $base->prepare($sql);
$resultado->execute(array(":id_examen" => $_POST["examen"], ":id_grupo" => $_POST["grupo"]));

header("Location:listaAplicaciones.php");
?>