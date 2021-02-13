<?php

class Usuario{

    private $id;
    private $nombre;
    private $apellidos;
    private $rol;
    private $email;
    private $password;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = DbConnect::connect();
    }

    public function getId(){
        return $this->db->real_escape_string($this->id);
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;

    }

    public function getEmail()
    {
        return  $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

    }
    public function getPassword()
    {
        return  $this->password;
    }
    public function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT);
    }
    public function getDb(){
        return $this->db;
    }
    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}',
            '{$this->getEmail()}','{$this->getPassword()}','user',NULL)";
        $save = $this->db->query($sql);
        if($save){
            return true;
        }
        else{
            echo $this->db-> error;
            return false;
        }
    }

    public function login($email, $password){
        $sql = "SELECT nombre, password, rol FROM usuarios WHERE email='$email'";
        $login = $this->db->query($sql);
        var_dump($login);
        if($login){
            var_dump($login);
            $countObject = $login->fetch_object();
            var_dump($password);
            $verify = password_verify($password,$countObject->password);
            var_dump($verify);
            if($verify){
                return $countObject;
            }
           }
        return false;
    }
}