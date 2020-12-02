<?php
    include("../general/conexion.php");

    function getExamenes(){
        $base = getConexion();
        $conexion = $base->query("SELECT * FROM examen");
        $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $examenes;
    }

    function getExamen($id){
        $base = getConexion();
        $conexion = $base->query("SELECT * FROM examen where id_examen=$id");
        $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);
        $conexion = $base->query("SELECT * FROM pregunta where id_examen =$id");
        $examenes[0]->preguntas = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $examenes[0];
    }
?>