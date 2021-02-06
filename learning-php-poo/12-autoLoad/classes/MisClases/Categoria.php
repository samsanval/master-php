<?php
namespace MisClases;


class Categoria{

    private $nombre;
    private $description;

    public function __construct($nombre, $description){
        $this->nombre= $nombre;
        $this->description = $description;
    }
}