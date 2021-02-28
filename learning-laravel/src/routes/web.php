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

Route::get('/peliculas/{pagina?}','\App\Http\Controllers\PeliculaController@index');

Route::get('/detalle/{year?}', array(
    'uses' => 'App\Http\Controllers\PeliculaController@detail',
    'as' => 'detalle.pelicula',
    'middleware' => 'testYear'));

Route::get('/redirect','\App\Http\Controllers\PeliculaController@redirect');

Route::get('/form','\App\Http\Controllers\PeliculaController@form');

Route::post('/receiveForm', '\App\Http\Controllers\PeliculaController@receiveForm');

//Route Resource
Route::resource('usuario','\App\Http\Controllers\UsuarioController');

//Rutas fruta
Route::group(array( 'prefix' => 'frutas'), function (){
    Route::get('index','\App\Http\Controllers\FrutaController@index');
    Route::get('detail/{id}','\App\Http\Controllers\FrutaController@detail');
    Route::get('crear', '\App\Http\Controllers\FrutaController@create');
    Route::post('save', '\App\Http\Controllers\FrutaController@save');
    Route::get('delete/{id}','\App\Http\Controllers\FrutaController@delete');
    Route::get('edit/{id}','\App\Http\Controllers\FrutaController@edit');
    Route::post('update/{id}', '\App\Http\Controllers\FrutaController@update');



});
/*
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
*/
