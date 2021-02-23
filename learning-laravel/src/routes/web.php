<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mostrarFecha', function () {
    return view('showdate', array(
        'title' => 'Para mostrar la fecha',
    ));
});
Route::get('/pelicula/{titulo}/{year}', function ($titulo = 'No hay pelicula seleccionada', $year){
    return view('pelicula', array(
        'title' => $titulo,
        'year' => $year
    ));
})->where(array(
    'title' => '[a-zA-Z]+',
    'year' => '[0-9]+'
));

Route::get('/list-films',function(){
    $list = ['Batman','Ordet','Parasitos'];
   return view('peliculas.list')->with('list', $list);
});

Route::get('/page',function (){
    return view('pagina');
});
