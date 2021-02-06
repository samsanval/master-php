<?php
class Persona{

    public $nombre;
    public $apellidos;

    public function __construct($nombre, $apellidos){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;

    }
    public function __destruct(){
        echo "Terminado";

    }
    public function __toString(){
        return 'El usuario es '.$this->nombre.' y sus apellidos son '.$this->apellidos;
    }
}

$usuario = new Persona('Samuel', 'Sanchez');
for($i = 0 ; $i<10; $i++){
    echo $usuario->nombre.'<br/>';
}
echo $usuario;