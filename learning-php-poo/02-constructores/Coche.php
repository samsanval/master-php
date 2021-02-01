<?php
//POO en PHP

class Coche{

    //Atributos
    private $color;
    private $marca;
    private $modelo;
    private $velocidad;
    private $caballos;
    private $plazas;

    public function __construct($color,$marca,$modelo,$velocidad,$caballos,$plazas){
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->plazas = $plazas;

    }

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getMarca(){
        return $this->marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function accelerate(){
        $this->velocidad++;
    }

    public function brake(){
        $this->velocidad--;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function getCaballos(){
        return $this->caballos;
    }

    public function getPlazas(){
        return $this->plazas;
    }

    public static function getInfo($coche){
        if(is_object($coche)){
            $informacion = '<h1>Informacion del coche</h1>';
            $informacion .= '<p>Modelo: '.$coche->getModelo();
            $informacion .= ' Marca : '.$coche->getMarca() .'</p>';
            return $informacion;
        }
    }
}