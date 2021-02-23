@include('includes.header')
<h1>Listado de peliculas</h1>
 {{$list[0]}}
 {{date('Y')}}
{{--Esto es un comentarios --}}
 {{ $direct ?? 'No hay director' }}

 {{--Condicionales--}}
 @if($list && count($list) > 5)
     El titulo existe y es {{$list[0]}}
 @elseif(count($list) > 5)
    El titulo no existe o la lista es inferior a 5
 @endif

 @foreach($list as $pelicula)
     <p>{{$pelicula}}</p>
 @endforeach

@include('includes.footer')
