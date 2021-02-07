<?php

function autoCarga($className){
    include 'controllers/'.$className.'.php';
}

spl_autoload_register('autoCarga');