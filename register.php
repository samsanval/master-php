<?php
if(isset($_POST['submit'])){
    require_once 'includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $password =  isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
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
    if(!empty($password)){
        $password_validado= true;
    }
    else{
        $password_validado = false;
        $errores['password'] = 'Password no valido';

    }
    if(!empty($errores)){
       $_SESSION['errores'] = $errores;
       header('Location: index.php');
    }
    else{
        $password_segura =  password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        if(password_verify($password,$password_segura)){
            $sql =  "INSERT INTO usuarios values(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";
            $insert = mysqli_query($db,$sql);
            if($insert){
                $_SESSION['insert'] = 'Se ha registrado correctamente';
            }
            else{
                $_SESSION['errores']['registrar'] = 'Fallo al registrar '.mysqli_error();

            }
        }
    }
}
header('Location: index.php');