<?php

require_once('Configuration.php');
Configuration::setColor('blue');
Configuration::setNewsLetter(true);
Configuration::setEntorno('localhost');

echo Configuration::getColor() .'<br/>';