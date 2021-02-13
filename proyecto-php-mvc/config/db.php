<?php

class DbConnect{
    public static function connect(){
        $db = new mysqli('localhost','samuel','admin','tienda_master');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}