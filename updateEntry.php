<?php
if(isset($_POST)){
    require_once('includes/conexion.php');
    if(!isset($_SESSION)){
        session_start();
    }
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
    if(empty($errroes)){
        $idEntrada = $_GET['id'];
        $updateQuery = "UPDATE entradas
                        SET categoria_id = '$categoria_id',
                        titulo = '$titulo',
                        description = '$description'
                        WHERE id = '$idEntrada'";
        $queryLanzada = mysqli_query($db,$updateQuery);
    }
}
header('Location:blogEntry.php?id='.$_GET['id']);