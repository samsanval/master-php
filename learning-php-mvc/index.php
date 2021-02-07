<?php

require_once 'autoLoad.php';

if(isset($_GET['controller'])){
    $nombreController = $_GET['controller'].'Controller';
}
if(class_exists($_GET['controller'].'Controller')){
    $controlador = new $nombreController();
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }

}