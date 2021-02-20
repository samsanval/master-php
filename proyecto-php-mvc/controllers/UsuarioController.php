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
        if(!$this->checkFormPost()){
            return header('Location:'.BASE_URL.'/usuario/registerUser');
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

    public function login(){
        if(!$this->checkLoginPost()){
            return header('Location:'.BASE_URL);
        }
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $login= $usuario->login($usuario->getEmail(),$_POST['password']);
        if($login){
            $_SESSION['login'] = 'successed';
            $_SESSION['identity'] = $login;
            if($login->rol =='admin'){
                $_SESSION['admin'] = true;
            }
        }
        else{
            $_SESSION['login'] = 'failed';
        }
        return header('Location:'.BASE_URL);


    }

    public function unlogin(){
        if(!isset($_SESSION['login'])){
            return false;
        }
        unset($_SESSION['login']);
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        return header('Location:'.BASE_URL);

    }
    //Guard clauses
    private function checkFormPost(){
        return isset($_POST) && $this->checkFormPostValues();
    }
    private function checkLoginPost(){
        return isset($_POST) && $this->checkLoginPostValues();
    }
    private function checkFormPostValues(){
        return isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email'])
            && isset($_POST['password']);
    }
    private function checkLoginPostValues(){
        return isset($_POST['email'])&& isset($_POST['password']);
    }
}