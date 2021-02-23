<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo - @yield('title')</title>
</head>
<body>
    @section('header')
        <h1>CABECERA DE LA WEB (master)</h1>
        <hr/>
    @show
    <div class="container">
        @yield('content')
    </div>
    @section('footer')
        <hr/>
        PIE DE LA PAGINA MASTER
    @show
</body>
</html>
