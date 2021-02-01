<?php

class Persona{

    private $nombre;
    private $apellidos;
    private $edad;



    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function setEdad($edad){
        $this->edad= $edad;
    }
    public function speak(){
        return "Digan algo";
    }
    public function walk(){
        return "Hagan algo";
    }
}

class Informatico extends Persona{

    private $languages;

    public function __construct(){
        $this->languages = "HTML, CSS, JS";
    }

    public function getLanguages(){
        return $this->languages;
    }
    public function developer(){
        return "Desarrolla";
    }
    public function reparar(){
        return '404 no se que...';
    }
    public function excel(){
        return 'fpDDNPADADPHAdADDadhd8910ye891  y31 3e¡';
    }
}
class TecnicoRedes extends Informatico{
    private $audit;
    private $experiencia;

    public function __construct(){
        parent::__construct();
        $this->audit = 'Expert';
        $this->experiencia = '5 años';
    }

    public function getAudit(){
        return "Estoy en una auditoria";
    }
}