<?php
function showErrors($errores, $campo){
    $alert = '';
    if(isset($campo) && !empty($campo)){
        $alert = '<div class="alerta-error">'.$errores[$campo].'</div> ';
    }
    return $alert;
}
function deleteErrors(){
    $_SESSION['errores'] = NULL;
    return true;
}

function getCategorias($db){
    $query = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($db, $query);
    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) > 0 ){
        $resultado = $categorias;
    }
    return $resultado;
}
function getEntradas($db){
    $query = "SELECT e.*, c.nombre
        FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id
        ORDER BY e.id DESC
        LIMIT 4";
    $entradas = mysqli_query($db, $query);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) > 0){
        $resultado = $entradas;
    }
    return $resultado;
}
