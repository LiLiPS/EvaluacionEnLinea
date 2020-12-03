<?php 

    // Credenciales de la base de datos
    define('DB_USUARIO','root');
    define('DB_PASSWORD','123456');
    define('DB_HOST','localhost');
    define('DB_NOMBRE','examen');

    $conn = new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);
   
    $correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
    $psw = filter_var($_POST['psw'],FILTER_SANITIZE_STRING);

    try{

        $stmt = $conn->prepare("INSERT INTO usuario (usuario , contrasenia) VALUES (?, ?)");
        $stmt->bind_param("ss", $correo,$psw);
        $stmt->execute();

        if( $stmt->affected_rows == 1 ){
   
            header("location:../../index.php");
        }

        $stmt->close();
        $conn->close();

    }catch(Exception $e){
 
        header("location:../../registro.php");

    }

    

?>