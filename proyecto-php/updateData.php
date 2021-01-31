<?php
if(isset($_POST)){
    require_once('includes/conexion.php');
    if(!isset($_SESSION)){
        session_start();
    }
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $errores = array();
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/',$nombre)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombre'] = 'Nombre no valido';

    }
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/',$apellidos)){
        $apellidos_validado = true;
    }
    else{
        $apellidos_validado = false;
        $errores['apellidos'] = 'Apellidos no validos';

    }
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }
    else{
        $email_validado = false;
        $errores['email'] = 'Email no valido';

    }
    if(empty($errores)){
        $usuario = $_SESSION['usuario']['id'];
        $sql_update = "UPDATE usuarios
                        SET nombre = '$nombre',
                        apellidos = '$apellidos',
                        email = '$email'
                        WHERE id = $usuario" ;
        $query = mysqli_query($db,$sql_update);
        if(!$query){
            $_SESSION ['errores_entrada'] =$errores;
        }
        else{
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellidos;
            $_SESSION['usuario']['email']= $email;
        }
    }
}
header('Location:myData.php');