<?php

class Producto{

    private $id;
    private $categoria_id;
    private $nombre;
    private $description;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
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

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
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

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description =  $this->db->real_escape_string($description);

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */ 
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
      /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    public function getAll(){
        $query = "SELECT * FROM productos ORDER BY id DESC";
        $productos = $this->db->query($query);
        return $productos;
    }

    public function findById($id){
        $query = "SELECT * FROM productos WHERE id = $id ORDER BY id DESC";
        $productos = $this->db->query($query);
        return $productos->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL,'{$this->getCategoria_id()}','{$this->getNombre()}',
        '{$this->getDescription()}','{$this->getPrecio()}','{$this->getPrecio()}','{$this->getStock()}',CURDATE(),'{$this->getImagen()}')";
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
    public function update(){
        $sql = "UPDATE productos
                SET nombre='{$this->getNombre()}',
                    descripcion= '{$this->getDescription()}',
                    precio='{$this->getPrecio()}',
                    stock='{$this->getStock()}',
                    imagen='{$this->getImagen()}'
                    WHERE id='{$this->getId()}'";
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
    public function delete(){
        $sql = "DELETE FROM productos WHERE id='{$this->getId()}'";
        $delete = $this->db->query($sql);
        var_dump($delete);
        if($delete){
            return true;
        }
        else{
            var_dump($this->db-> error);
            die();
            return false;
        }
    }
}