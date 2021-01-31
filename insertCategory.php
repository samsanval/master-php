<?php
if(isset($_POST)){
    require_once('includes/conexion.php');
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $errores = array();
    if(!empty($nombre) && !is_numeric($nombre)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombre'] = 'Nombre no valido';

    }
    if(empty($errores)){
        $insert = "INSERT INTO categorias values(null,'$nombre')";
        $query = mysqli_query($db, $insert);
        if(!$query){
        }
    }

}
header('Location: index.php');