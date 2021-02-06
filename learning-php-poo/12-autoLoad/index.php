<?php

require_once('autoLoad.php');

use MisClases\Usuario,MisClases\Categoria, MisClases\Entrada;
use PanelAdministrador\Usuario as PanelAdminUser;


class Main{
    private $usuario;
    private $categoria;
    private $entrada;

    public function __construct(){
        $this->usuario = new Usuario('Samuel','Sanchez');
        $this->categoria = new Categoria('Ejemplo','ejemplo');
        $this->entrada = new Entrada('Ejemplo','ejemplo');
    }

    public function getInfo(){
        echo __CLASS__, PHP_EOL;
        echo __METHOD__, PHP_EOL;
        echo __FILE__, PHP_EOL;
        echo __NAMESPACE__, PHP_EOL;

    }

}
$usuario = new PanelAdminUser('Panel','Admin');
$main = new Main();

//Si existe el metodo en una clase
echo class_exists('PanelAdministrador\Usuario');
var_dump (get_class_methods($main));
$main->getInfo();