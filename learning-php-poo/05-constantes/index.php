<?php

class Usuario{

    const URL_COMPLETA= 'http://localhost' ;
    private $email;
    private $password;

    public function getEmail(){
        return $email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

}
$usuario = new Usuario();
echo $usuario::URL_COMPLETA;