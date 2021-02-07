<?php
require_once 'ModeloBase.php';

class Nota implements ModeloBase{
    private $titulo;
    private $description;
    private $usuarioId;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getUsuarioId(){
        return $this->usuarioId;
    }
    public function setUsuarioId($id){
        $this->usuarioId = $id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($contenido){
        $this->description = $contenido;
    }

    public function getAll(){
        $query = $this->db->query("SELECT * FROM notas ORDER BY id DESC");
        return $query;
        echo "Todas las notas";
    }
    public function save(){
        $sql = "INSERT INTO notas(usuario_id,titulo, descripcion,fecha) values({$this->getUsuarioId()},'{$this->getTitulo()}',
        '{$this->getDescription()}',CURDATE())";
        $save = $this->db->query($sql);
        return $save;
    }
}