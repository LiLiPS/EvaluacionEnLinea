<?php
    session_start();
    include("../general/conexion.php");

    $idExamen = $_POST["id_examen"];
    $pks = $_POST["pks"];
    $idUsuario = $_SESSION["id_usuario"];
    $base = getConexion();

    $pks_separados = explode(",", $pks);
    $tam_pks = sizeof($pks_separados);
    $porcentajePalabras = 0;

    foreach($pks_separados as $pk){
        $id_pregunta = $pk;
        $respuesta = $_POST["r_$pk"];

        $insertRespuesta = "INSERT INTO Respuesta_alumno (id_examen, id_pregunta, id_usuario, respuesta) VALUES (:idE, :idP, :idU, :resp)";
        $resultado = $base->prepare($insertRespuesta);
        $resultado->execute(array(":idE"=>$idExamen, ":idP"=>$id_pregunta, ":idU"=>$idUsuario, ":resp"=>$respuesta));

        //Revisar si tiene los conceptos 
        //1. Buscar pregunta
        $buscaPregunta = "SELECT * FROM pregunta WHERE id_pregunta=$id_pregunta";
        $resultado = $base->query($buscaPregunta);
        $pregunta = $resultado->fetch(PDO::FETCH_OBJ);
        
        $palabras = explode(",", $pregunta->palabras_clave); 
        $tamano = sizeof($palabras);
        $encontradas = 0;

        foreach($palabras as $palabra){
            $pos = strpos($respuesta, $palabra);
            if($pos === false){
                echo $palabra . ": no la encontró <br>";
            } else{
                echo $palabra . ": sí la encontró <br>";
                $encontradas ++;
            }
        }

        $porcentaje = ($encontradas*60)/$tamano;

        $porcentajePalabras += $porcentaje;
        echo $porcentaje . "%<br><br>"; 
    }

    $resultadoPalabras = $porcentajePalabras/$tam_pks;

    echo "Resultado final: " . $resultadoPalabras; 

    $insertResultado = "INSERT INTO examen_alumno (id_examen, id_usuario, fecha, resultado) VALUES (:idE, :idU, :fecha, :resultado)";
    $resultado = $base->prepare($insertResultado);
    $resultado->execute(array(":idE"=>$idExamen, ":idU"=>$idUsuario, ":fecha"=>date('Y-m-d'), ":resultado"=>$resultadoPalabras));

    //header("Location:revisarExamen.php");
?>