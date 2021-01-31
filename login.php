<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db,$query);
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        $password_segura =  password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        if(password_verify($password,$password_segura)){
            var_dump($usuario);
            $_SESSION['usuario'] = $usuario;
            if(isset($_SESSION['errorLogin'])){
                session_unset();
            }
         }
         else{
             $_SESSION['error_login'] = 'Error';
         }
    }
}
header('Location:index.php');