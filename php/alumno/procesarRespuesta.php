<?php
    session_start();
    include("../general/conexion.php");
    include("webServiceAzure.php");
    include("googleService.php");

    $base = getConexion();
    $idExamen = $_POST["idExamen"];
    $idUsuario = $_SESSION["id_usuario"];
    $pk_pregunta = $_POST["pk_pregunta"];
    $respuesta = mb_strtolower($_POST["respuesta"], 'UTF-8');
    $respuesta2 = $_POST["respuesta"];


    $insertRespuesta = "INSERT INTO Respuesta_alumno (id_examen, id_pregunta, id_usuario, respuesta) VALUES (:idE, :idP, :idU, :resp)";
    $resultado = $base->prepare($insertRespuesta);
    $resultado->execute(array(":idE"=>$idExamen, ":idP"=>$pk_pregunta, ":idU"=>$idUsuario, ":resp"=>$respuesta));

    $data = array (
        'documents' => array (
            array ('id' => '1', 'text' => $respuesta2)
        )
    );

    // calling azure services
    $result = DetectLanguage ($data);
    // calling google services
    $result2 = analizaSintaxis($respuesta2);

    $buscaPregunta = "SELECT * FROM pregunta WHERE id_pregunta=$pk_pregunta";
    $resultado = $base->query($buscaPregunta);
    $pregunta = $resultado->fetch(PDO::FETCH_OBJ);

    $palabras = explode(",", $pregunta->palabras_clave); 
    $tamano = sizeof($palabras);
    $encontradas = 0;

    // processing results
    echo GetEntities($respuesta, $palabras, $tamano, $result, $result2);
?>