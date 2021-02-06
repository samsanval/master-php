<?php
class Persona{
    private $nombre;
    private $apellidos;

    public function __construct($nombre, $apellidos){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;

    }

    public function __call($name, $arguments){
        $prefix = substr($name,0,3);
        if($prefix === 'get'){
            $nombre_metodo = substr(strtolower($name),3);
            return $this->$nombre_metodo;
        }
    }

}
$persona = new Persona('Samuel','Sanchez');
echo $persona->getNombre();
echo $persona->getApellidos();