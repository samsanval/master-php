<?php
require_once 'ModeloBase.php';

class Usuario implements ModeloBase{

    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $db;

    public function __construct(){
        $this->db = Database::connect();

    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getAppellidos(){
        return $this->apellidos;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setNombre($nombre){
        $this->nombre= $nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos= $apellidos;
    }
    public function setEmail($email){
        $this->email= $email;
    }
    public function setPassword($password){
        $this->password= $password;
    }

    public function getAll(){
        $query = $this->db->query("SELECT * FROM usuarios ORDER BY id DESC");
        return $query;    }
}