<?php
include("../general/conexion.php");

$base = getConexion();

$sql = "UPDATE examen_grupo 
        SET id_examen = :id_examen, id_grupo = :id_grupo, fecha = :fecha, hora_inicio = :hora_inicio, hora_fin = :hora_fin 
        WHERE id_examen_grupo = :id_examen_grupo";

$resultado = $base->prepare($sql);
$resultado->execute(
    array(
        ":id_examen" => $_POST["examen"],
        ":id_grupo" => $_POST["grupo"],
        ":fecha" => $_POST["fecha"],
        ":hora_inicio" => $_POST["hora_inicio"],
        ":hora_fin" => $_POST["hora_fin"],
        ":id_examen_grupo" => $_POST["id_examen_grupo"]
    )
);

header("Location:listaAplicaciones.php");
?>