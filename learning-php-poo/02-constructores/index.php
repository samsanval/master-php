<?php
require_once('Coche.php');

$coche = new Coche('Rojo','Ferrari','Aventador',300,500,2);
$renault = new Coche('Verde','Renault','Megane',200,300,5);
echo Coche::getInfo($renault);