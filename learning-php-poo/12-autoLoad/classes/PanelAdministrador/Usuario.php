<?php
namespace PanelAdministrador;

class Usuario{

    private $nombre;
    private $email;

    public function __construct($nombre, $email){
        $this->nombre = $nombre;
        $this->email = $email;
    }
}