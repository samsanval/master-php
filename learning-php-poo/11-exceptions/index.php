<?php

try{
    if(isset($_GET['id'])){
        echo '<h1>'.$_GET['id'] .'</h1>';
    }
    else{
        throw new Exception('Que ha pachado');
    }
}catch(Exception $e ){
    echo "Ha habido un error: ".$e->getMessage();
}