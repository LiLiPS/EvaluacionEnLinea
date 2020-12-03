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
    //Editar el nombre del examen
    $sql = "UPDATE Examen SET nombre = :nom WHERE id_examen= :id_examen";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombreExamen, ":id_examen"=>$_POST["idExamen"]));

    //Eliminar las preguntas
    $sql = "DELETE from Pregunta WHERE id_examen= :id_examen";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id_examen"=>$_POST["idExamen"]));

    //Crear las preguntas de nuevo
    for ($i=0; $i < count($preguntas); $i++) { 
        $insertPregunta = "INSERT INTO Pregunta (id_examen, pregunta, palabras_clave) VALUES (:idE, :preg, :pc)";
        $resultado = $base->prepare($insertPregunta);
        $resultado->execute(array(":idE"=>$_POST["idExamen"], ":preg"=>$preguntas[$i], ":pc"=>$palabrasClave[$i]));
    }

    header("Location:listaExamenes.php");
?>