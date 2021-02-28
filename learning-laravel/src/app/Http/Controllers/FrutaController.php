<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{
    public function index()
    {
        $frutas = DB::table('frutas')
            ->orderBy('id','DESC')
            ->get();
        return view ('fruta.index',array(
            'frutas' => $frutas,
        ));
    }
    public function detail($id)
    {
        $fruta = DB::table('frutas')->where('id','=',$id)->first();
        return view ('fruta.detail', array(
            'fruta' => $fruta,
        ));
    }
    public function create()
    {
        return view ('fruta.create');
    }
    public function save(Request $request)
    {
        $fruta = DB::table('frutas')->insert(array(
           'nombre' => $request->input('nombre'),
           'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'fecha' => date('Y-m-d')

        ));
        return redirect()->action('\App\Http\Controllers\FrutaController@index')
            ->with('status','Fruta creada correctamente');
    }
    public function delete($id)
    {
        $fruta = DB::table('frutas')->where('id','=',$id)->delete();
        return redirect()->action('\App\Http\Controllers\FrutaController@index')
            ->with('status','Fruta borrada correctamente');
    }
    public function edit($id)
    {
        $fruta = DB::table('frutas')->where('id','=',$id)->first();
        return view ('fruta.create', array(
            'fruta' => $fruta
        ));
    }
    public function update($id, Request $request)
    {
        $fruta = DB::table('frutas')->where('id','=',$id)->first()->update(
            array(
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'precio' => $request->input('precio')
            )
        );
        return redirect()->action('\App\Http\Controllers\FrutaController@index')
            ->with('status','Fruta actualizada correctamente');
    }
}
