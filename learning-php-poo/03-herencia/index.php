<?php
require_once('clases.php');
$persona = new Persona();
$persona->setNombre('Samuel');
echo $persona->speak() .'<br/>';


$informatico = new Informatico();
echo $informatico -> speak() .'<br/>';
echo $informatico->getLanguages() .'<br/>';

$tecnico = new TecnicoRedes();
