<?php

require_once 'models/Categoria.php';

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
    //Guard clauses
    private function checkFormPost(){
        return isset($_POST) && $this->checkFormPostValues();
    }
    private function checkFormPostValues(){
        return isset($_POST['nombre']);
    }
}