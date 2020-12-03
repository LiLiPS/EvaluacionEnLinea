<?php
    include("../general/conexion.php");

    function getGrupos(){
        $base = getConexion();
        $conexion = $base->query("SELECT * FROM Grupo");
        $grupos = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $grupos;
    }
?>