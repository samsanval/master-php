<?php

require_once 'models/Usuario.php';

class UsuarioController{

    public function index(){
        echo "Controlador usuarios ok";
    }

    public function registerUser(){
        require_once('views/usuario/register.php');
    }
    public function save(){
        if(!$this->checkPost()){
            header('Location:'.BASE_URL.'/usuario/registerUser');
        }
        $usuario = new Usuario();
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $save = $usuario->save();
        if($save){
           $_SESSION['register'] = 'completed';
        }
        else{
            $_SESSION['register'] = 'failed';

        }
        header('Location:'.BASE_URL.'/usuario/registerUser');

    }
    //Guard clauses
    private function checkPost(){
        return isset($_POST) && checkPostValues();
    }
    private function checkPostValues(){
        return isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email'])
            && isset($_POST['password']);
    }
}