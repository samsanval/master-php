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
function getEntradas($db , $limit = null){
    $query = "SELECT e.*, c.nombre
        FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id
        ORDER BY e.id DESC";
    if($limit != NULL){
        $query .= " LIMIT $limit";
    }
    $entradas = mysqli_query($db, $query);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) > 0){
        $resultado = $entradas;
    }
    return $resultado;
}
function getCategory($db,$id){
    $categoriaQuery = "SELECT *
                       FROM categorias
                       WHERE id = '$id'";
    $categoria = mysqli_query($db,$categoriaQuery);
    $resultado = array();
    if ($categoria && mysqli_num_rows($categoria) > 0 ){
        $resultado = mysqli_fetch_assoc($categoria);
    }
    return $resultado;

}
function getEntriesByCategory($db,$categoryId){
    $query = "SELECT e.*, c.nombre
    FROM entradas e
    INNER JOIN categorias c ON e.categoria_id = c.id
    WHERE e.categoria_id = $categoryId
    ORDER BY e.id DESC";
    $entradas = mysqli_query($db, $query);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) > 0){
         $resultado = $entradas;
    }
    return $resultado;
}

function getEntry($db, $id){
    $query = "SELECT e.*, c.nombre AS categoriaNombre, u.nombre AS autor
             FROM entradas e
             INNER JOIN categorias c ON c.id = e.categoria_id
             INNER JOIN usuarios u ON u.id = e.usuario_id
             WHERE e.id = $id";
    $entrada = mysqli_query($db, $query);
    $resultado = '';
    if($entrada && mysqli_num_rows($entrada) > 0){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}
function getEntriesBySearch($db,$busqueda){
    $query = "SELECT e.*, c.nombre
        FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id
        WHERE titulo LIKE '%$busqueda%'
        ORDER BY e.id DESC";
    $entradas = mysqli_query($db, $query);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) > 0){
        $resultado = $entradas;
    }
    return $resultado;
}
