<?php

class Pedido{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
      $this->db = DbConnect::connect();

    }
    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     *
     * @return  self
     */ 
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);

        return $this;
    }

    /**
     * Get the value of coste
     */ 
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */ 
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
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
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    public function getAll(){
        $query = "SELECT * FROM pedidos ORDER BY id DESC";
        $productos = $this->db->query($query);
        return $productos;
    }
    public function findById($id){
        $query = "SELECT * FROM pedidos WHERE id = $id ORDER BY id DESC";
        $productos = $this->db->query($query);
        return $productos->fetch_object();
    }

    public function findbyUser(){
        $usuarioId =  $this->getUsuario_id();
        $query = "SELECT p.id, p.coste, lp.unidades FROM pedidos p
            INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id
             WHERE p.usuario_id = $usuarioId ORDER BY id DESC";
        $productos = $this->db->query($query);
        if($productos){
          return $productos->fetch_object();
        }
        else{
          var_dump($this->db-> error);
          die();
          return false;
        }
    }
    public function findAllbyUser(){
        $usuarioId =  $this->getUsuario_id();
        $query = "SELECT p.id, p.coste, p.fecha FROM pedidos p
            INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id
             WHERE p.usuario_id = $usuarioId";
        $productos = $this->db->query($query);
        if($productos){
          return $productos;
        }
        else{
          var_dump($this->db-> error);
          die();
          return false;
        }
    }

    public function getProductsByPedidoId($pedidoId){
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id
        WHERE lp.pedido_id={$pedidoId}";
          $productos = $this->db->query($sql);
          if($productos){
            return $productos;
          }
          else{
            var_dump($this->db-> error);
            die();
            return false;
          }
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(NULL,'{$this->getUsuario_id()}','{$this->getProvincia()}',
        '{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME())";
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

    public function saveLinea(){
      $sql = "SELECT LAST_INSERT_ID() as pedido FROM pedidos";
      $linea = $this->db->query($sql);
      $pedido = $linea->fetch_object()->pedido;
      foreach($_SESSION['carrito'] as $producto){
        $insert = "INSERT INTO lineas_pedidos VALUES(null,'{$pedido}','{$producto['id']}','{$producto['unidades']}')";
        $save = $this->db->query($insert);
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

    public function updateStatus(){
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id = '{$this->getId()}'";
        $update = $this->db->query($sql);
        if($update){
            return true;
        }
        else{
            var_dump($this->db-> error);
            die();
            return false;
        }

    }

}