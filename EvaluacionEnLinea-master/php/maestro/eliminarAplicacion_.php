<?php
include("../general/conexion.php");

$base = getConexion();

$sql = "DELETE from examen_grupo WHERE id_examen_grupo= :id_examen_grupo";
$resultado = $base->prepare($sql);
$resultado->execute(array(":id_examen_grupo"=>$_GET["id"]));

header("Location:listaAplicaciones.php");
?>