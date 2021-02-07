<?php

class UsuarioController{

    public function list(){
        require_once 'models/Usuario.php';
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require_once 'views/usuarios/list.php';
    }
    public function createUser(){
        require_once 'views/usuarios/createUser.php';
    }
}