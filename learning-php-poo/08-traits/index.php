<?php

trait Utils{
    public function getNombre(){
        return "<h1>El nombre es ".$this->nombre."</h1>";
    }
}

class Car{

    use Utils;
    public $nombre;
    public $marca;
}

class Persona{

    public $nombre;
    public $apellidos;
    use Utils;
}

class Videogame{
    public $nombre;
    public $year;
}

$car = new Car();
$car->nombre = 'Citroen';
$person = new Persona();
$person->nombre = 'Samuel';
$videogame = new Videogame();

echo $car->getNombre();
echo $person->getNombre();