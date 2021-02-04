<?php

interface Ordenador{

    public function turnOn();
    public function turnOff();
    public function reboot();
    public function unFragment();
}
class Lenovo implements Ordenador{

    private $modelo;

    public function getModelo(){
        return $modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function turnOn(){
        return 'Encendido';
    }
    public function turnOff(){
        return 'Apagado';
    }
    public function reboot(){
        return 'Reiniciado';
    }
    public function unFragment(){
        return 'Desfragmentar';
    }
}

$lenovo = new Lenovo();
var_dump($lenovo);