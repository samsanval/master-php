<h1>{{$title}}</h1>
<p>(Accion Index del controlador PeliculaController)</p>
@if(isset($page))
    <h3>La pagina es {{$page}}</h3>
@endif
<a href="{{route('detalle.pelicula')}}">Ir al detalle</a>
