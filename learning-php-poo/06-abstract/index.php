<?php

abstract class Computer{

    protected $turned;

    abstract public function turnOn();
    abstract public function turnOff();

    public function getTurned(){
        return $this->turned;
    }
}

class PCAsus extends Computer{
    private $software;

    public function turnOnSoftware(){
        $this->software = true;

    }
    public function turnOn(){
        $this->turned = true;
    }
    public function turnOff(){
        $this->turned = false;
    }
}

$asus = new PCAsus();
$asus->turnOnSoftware();
$asus->turnOn();
var_dump($asus);