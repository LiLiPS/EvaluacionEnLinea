<?php 
    include("../general/conexion.php");

    $base = getConexion();
    $sql = "INSERT INTO usuario (usuario, contrasenia, id_rol, nombre, apellido_paterno, apellido_materno, no_control) 
            VALUES (:usuario, :contrasenia, :id_rol, :nombre, :apellido_paterno, :apellido_materno, :no_control)";

    $resultado = $base->prepare($sql);
    $id_rol = (strlen(trim($_POST['no_control'])) > 4) ? 2 : 1;
    $array = array(
                ":usuario"=>$_POST['usuario'],
                ":contrasenia"=>$_POST['psw'],
                ":id_rol"=>$id_rol,
                ":nombre"=>$_POST['nombre'],
                ":apellido_paterno"=>$_POST['apellido_paterno'],
                ":apellido_materno"=>$_POST['apellido_materno'],
                ":no_control"=>$_POST['no_control']
            );
    $resultado->execute($array);
    
    $base = null;
    header("location:../../index.php");
?>