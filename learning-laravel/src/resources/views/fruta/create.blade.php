@if(isset($fruta) && is_object($fruta))
    <h1>Editar fruta</h1>
@else
    <h1>Crear una fruta</h1>
@endif
<form action={{
    isset($fruta)?
    action('\App\Http\Controllers\FrutaController@save'):
    action('\App\Http\Controllers\FrutaController@update')}}
    method="POST">

    {{ csrf_field() }}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{isset($fruta)? $fruta->nombre:''}}"/>
    <label for="precio">Precio</label>
    <input type="text" name="precio"  value="{{isset($fruta)? $fruta->precio:''}}"/>
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion"  value="{{isset($fruta)? $fruta->descripcion:''}}"/>

    <input type="submit" value="Insertar">

</form>
