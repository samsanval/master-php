<h1>{{$fruta->nombre}}</h1>
<p>
    {{$fruta->descripcion}}
</p>
<a href="{{action('\App\Http\Controllers\FrutaController@delete',array('id' => $fruta->id))}}">Eliminar</a>
<a href="{{action('\App\Http\Controllers\FrutaController@edit',array('id' => $fruta->id))}}">Actualizar</a>
