<?php
    include("../general/conexion.php");

    function getAplicaciones()
    {
        $base = getConexion();
        $sql = "
            SELECT 
                examen_grupo.id_examen_grupo,
                examen.nombre as examen,
                grupo.nombre as grupo
            FROM 
                examen_grupo
                LEFT JOIN examen ON examen.id_examen = examen_grupo.id_examen
                LEFT JOIN grupo ON grupo.id_grupo = examen_grupo.id_grupo ";
        $conexion = $base->query($sql);
        $aplicaciones = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $aplicaciones;
    }

    function getAplicacion($id)
    {
        $base = getConexion();
        $sql = "
                SELECT 
                    *
                FROM 
                    examen_grupo
                WHERE id_examen_grupo=$id";
        $conexion = $base->query($sql);
        $aplicacion = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $aplicacion[0];
    }

    function getGrupos()
    {
        $base = getConexion();
        $conexion = $base->query("SELECT * FROM Grupo");
        $grupos = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $grupos;
    }

    function getExamenes()
    {
        $base = getConexion();
        $conexion = $base->query("SELECT * FROM examen");
        $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);

        $base = null;
        return $examenes;
    }
?>