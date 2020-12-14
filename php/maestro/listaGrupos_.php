<?php
    include("../general/conexion.php");

    function getGrupos(){
        $base = getConexion();
        $instruccion = "SELECT * FROM grupo WHERE id_usuario = ". $_SESSION["id_usuario"];
        $conexion = $base->query($instruccion);
        $grupos = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $grupos;
    }
?>