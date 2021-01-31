<?php
    require_once('includes/conexion.php');
    session_start();
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
        $entradaID = $_GET['id'];
        $usuarioID = $_SESSION['usuario']['id'];
        $query = "DELETE FROM entradas
                 WHERE id = '$entradaID' AND usuario_id = $usuarioID ";
        $resultado = mysqli_query($db,$query);
    }
header('Location:index.php');