<?php
include("../general/conexion.php");

$base = getConexion();

$sql = "UPDATE examen_grupo 
        SET id_examen = :id_examen, id_grupo = :id_grupo 
        WHERE id_examen_grupo = :id_examen_grupo";

$resultado = $base->prepare($sql);
$resultado->execute(
    array(
        ":id_examen" => $_POST["examen"],
        ":id_grupo" => $_POST["grupo"],
        ":id_examen_grupo" => $_POST["id_examen_grupo"]
    )
);

header("Location:listaAplicaciones.php");
?>