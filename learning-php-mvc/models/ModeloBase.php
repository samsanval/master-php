<?php
require_once 'config/Database.php';
//Mejor usar interfaces que herencia
interface ModeloBase{

    public function getAll();
}