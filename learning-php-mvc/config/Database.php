<?php

class Database{

    public static function connect(){
        $connection = new mysqli('localhost','samuel','admin','php_mvc');
        $connection->query("SET names 'utf8'");
        return $connection;
    }
}