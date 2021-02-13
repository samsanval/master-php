<?php
class Utils{

    public static function deleteSession($session){
        if(isset($_SESSION[$session])){
            $_SESSION[$session] = null;
            unset($_SESSION[$session]);
        }
        return $session;
    }
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header('Location:'.BASE_URL);
        }
        return true;
    }

    public static function showCategories(){
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
}