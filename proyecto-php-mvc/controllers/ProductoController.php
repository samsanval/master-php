<?php
require_once "models/Producto.php";

class ProductoController{

    public function index(){
        require_once "views/producto/productosDestacados.php";
    }
    public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto ->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/producto/create.php';
    }

    public function save(){
        if(!$this->checkFormPost()){
            return false;
        }
        $producto = new Producto();
        $producto->setNombre($_POST['nombre']);
        $producto->setCategoria_id($_POST['categoria']);
        $producto->setDescription($_POST['descripcion']);
        $producto->setPrecio($_POST['precio']);
        $producto->setStock($_POST['stock']);
        $file = $_FILES['imagen'];
        $fileName = $file['name'];
        $mimeType = $file['type'];
        if($mimeType === 'image/jpg' || $mimeType === 'image/png'
            || $mimeType === 'image/gif' || $mimeType === 'image/jpeg' ){
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images',0777,true);
                }
            move_uploaded_file($file['tmp_name'],'uploads/images/'.$fileName);
        }
        $producto->setImagen($fileName);
        $producto->save();
        header('Location:'.BASE_URL.'/producto/gestion');

    }

    public function edit(){
        if(!$this->checkEditAndDelete()){
            var_dump($_GET);

            return false;
        }
        $edit = true;
        $producto = new Producto();
        $prod = $producto->findById($_GET['id']);
        require_once 'views/producto/create.php';
    }

    public function update(){
        if(!$this->checkFormPost()){
            return false;
        }
        $producto = new Producto();
        $producto->setId($_GET['id']);
        $producto->setNombre($_POST['nombre']);
        $producto->setCategoria_id($_POST['categoria']);
        $producto->setDescription($_POST['descripcion']);
        $producto->setPrecio($_POST['precio']);
        $producto->setStock($_POST['stock']);
        $file = $_FILES['imagen'];
        $fileName = $file['name'];
        $mimeType = $file['type'];
        if($mimeType === 'image/jpg' || $mimeType === 'image/png'
            || $mimeType === 'image/gif' || $mimeType === 'image/jpeg' ){
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images',0777,true);
                }
            move_uploaded_file($file['tmp_name'],'uploads/images/'.$fileName);
        }
        $producto->setImagen($fileName);
        $producto->update();
        header('Location:'.BASE_URL.'/producto/gestion');
    }

    public function delete(){
        Utils::isAdmin();
        if(!$this->checkEditAndDelete()){
            var_dump($_GET);

            return false;
        }
        $producto = new Producto();
        $producto->setId($_GET['id']);
        $producto->delete();
        header('Location:'.BASE_URL.'/producto/gestion');

    }

    private function checkFormPost(){

        return isset($_POST) && $this->checkFormPostValues();
    }
    private function checkFormPostValues(){
        return isset($_POST['nombre']) && isset($_POST['categoria']) && isset($_POST['descripcion'])
            && isset($_POST['precio'])  && isset($_POST['stock'])  && isset($_FILES['imagen']);
    }

    private function checkEditAndDelete(){
        return isset($_GET) && isset($_GET['id']);
    }
}