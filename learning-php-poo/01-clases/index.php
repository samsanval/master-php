<?php
//POO en PHP

class Coche{

    //Atributos
    private $color = 'Rojo';
    private $marca = 'Ferrari';
    private $modelo = 'Avantador';
    private $velocidad = 300;
    private $caballos = 500;
    private $plazas = 2;

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
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
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
}

$coche = new Coche();

echo $coche -> getVelocidad();
$coche->brake();
$coche->brake();
$coche->brake();
$coche->brake();
$coche -> setColor('Amarillo');
echo $coche->getColor();
echo $coche -> getVelocidad();