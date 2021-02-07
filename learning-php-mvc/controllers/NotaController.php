<?php

class NotaController{

    public function list(){
        require_once 'models/Nota.php';
        $nota = new Nota();
        $nota->setTitulo('hola');
        $nota->setDescription('Hola Mundo PHP MVC');
        $notas = $nota->getAll();
        require_once 'views/notas/list.php';

    }
    public function create(){

        require_once 'models/Nota.php';
        $nota = new Nota();
        $nota->setUsuarioId(1);
        $nota->setTitulo('Insertado');
        $nota->setDescription('Creado desde PHP');
        $nota->save();
        $this->list();
        header('Location:index.php?controller=Nota&action=list');

    }
    public function deleteNota(){

    }
}