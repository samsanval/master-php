<?php

function app_loadClasses($clase){
    require_once 'classes/'.$clase.'.php';
}
spl_autoload_register('app_loadClasses');