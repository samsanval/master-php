<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index($pagina=1){
        $title = 'Listado de mis peliculas';
        return view('pelicula.index', array(
            'title' => $title,
            'page' => $pagina
        ));
    }
    public function detail($year = null){
        return view('pelicula.detail');
    }
    public function redirect(){
        return redirect()->action('\App\Http\Controllers\PeliculaController@detail');
    }
    public function form(){
        return view('pelicula.form');
    }
    public function receiveForm(Request $request){
        $name = $request->input('nombre');
        $email = $request->input('email');
        return "El nombre es $name y el correo es $email";
    }
}
