<?php
    include("../general/conexion.php");

    $base = getConexion();
    $preguntas = [];
    $palabrasClave = [];
    $nombreExamen = $_POST["nombreExamen"];

    for ($i=1; $i < count($_POST); $i++) {
        if (isset($_POST["planteamiento" . $i])) {
            $preguntas[] = $_POST["planteamiento" . $i];
            $palabrasClave[] = $_POST["palabras" . $i];
        }else{
            break;
        }        
    }

    $sql = "INSERT INTO Examen (nombre) VALUES (:nom)";

    $resultado = $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombreExamen));

    $lastIDExamen = "SELECT LAST_INSERT_ID()";
    $resultado = $base->prepare($lastIDExamen);
    $resultado->execute();
    $lastIDExamen = $resultado->fetchColumn();

    for ($i=0; $i < count($preguntas); $i++) { 
        $insertPregunta = "INSERT INTO Pregunta (id_examen, pregunta, palabras_clave) VALUES (:idE, :preg, :pc)";
        $resultado = $base->prepare($insertPregunta);
        $resultado->execute(array(":idE"=>$lastIDExamen, ":preg"=>$preguntas[$i], ":pc"=>$palabrasClave[$i]));
    }

    header("Location:listaExamenes.php");
?>