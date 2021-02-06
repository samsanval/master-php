<?php
namespace MisClases;

class Entrada{

    private $titulo;
    private $fecha;

    public function __construct($titulo,$fecha){
        $this->titulo = $titulo;
        $this->fecha = $fecha;
    }
}