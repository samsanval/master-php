<?php
if(isset($_POST)){
    require_once('includes/conexion.php');
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db,$_POST['description']) : false;
    $categoria_id =  isset($_POST['categoria']) ? mysqli_real_escape_string($db,$_POST['categoria']) : false;
    $errores = array();
    if(!empty($titulo) && !is_numeric($titulo)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombre'] = 'Nombre no valido';

    }
    if(!empty($description) && !is_numeric($description)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['descripcion'] = 'Descripcion no valido';

    }
    if(!empty($categoria_id) && is_numeric($categoria_id)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['categoria'] = 'Categoria no valida';

    }
    if(empty($errores)){
        $usuario = $_SESSION['usuario']['id'];
        $insert = "INSERT INTO entradas values(null,'$usuario','$categoria_id','$titulo','$description',CURDATE())";
        $query = mysqli_query($db, $insert);
        if(!$query){
            $_SESSION ['errores_entrada'] =$errores;
        }
    }

}
header('Location: index.php');