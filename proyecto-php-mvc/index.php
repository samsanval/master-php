<?php

session_start();
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
require_once 'config/db.php';


function checkActionAndController(){
    if(!isset($_GET['controller']) && !isset($_GET['action'])){
        return false;
    }
    else if(!class_exists($_GET['controller'].'Controller')){
        return false;
    }
    return true;
}
function checkAction($controlador){
    if(!isset($_GET['action']) || !method_exists($controlador,$_GET['action'])){
        return false;
    }
    return true;
}
function sendDefault(){
    $nombreController = CONTROLLER_DEFAULT;
    $claseDefault = new $nombreController();
    $action = ACTION_DEFAULT;
    return $claseDefault->$action();
}
function sendErrorMethod(){
    $error = new ErrorController();
    return $error->index();
}
if(!checkActionAndController()){
    sendDefault();
}
else{
    $nombreController = $_GET['controller'].'Controller';
    $controlador = new $nombreController();
    if(!checkAction($controlador)){
        sendErrorMethod();
    }
    else{
        $action = $_GET['action'];
        $controlador->$action();
    }
require_once 'views/layout/footer.php';

}

