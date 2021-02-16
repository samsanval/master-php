<?php

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';

    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/categoria/create.php';
    }
    public function save(){
        Utils::isAdmin();
        if(!$this->checkFormPost()){
            return false;
        }
        $categoria = new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $categoria->save();
        header("Location:".BASE_URL.'/categoria/index');
    }

    public function view(){
        if(!$this->checkGet()){
            return false;
        }
        $categoria = new Categoria();
        $categoria->setId($_GET['id']);
        $producto = new Producto();
        $productos = $producto->getAllByCategory($categoria->getId());
        $cat = $categoria->findById();
        require_once 'views/categoria/view.php';

    }
    //Guard clauses
    private function checkFormPost(){
        return isset($_POST) && $this->checkFormPostValues();
    }
    private function checkFormPostValues(){
        return isset($_POST['nombre']);
    }
    private function checkGet(){
        return isset($_GET['id']);
    }
}