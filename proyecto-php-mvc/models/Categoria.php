<?php

class Categoria{

    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = DbConnect::connect();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre =  $this->db->real_escape_string($nombre);

    }

    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    public function getAll(){
        $query = "SELECT * FROM categorias ORDER BY id DESC";
        $categorias = $this->db->query($query);
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);
        if($save){
            return true;
        }
        else{
            var_dump($this->db-> error);
            die();
            return false;
        }

    }
}