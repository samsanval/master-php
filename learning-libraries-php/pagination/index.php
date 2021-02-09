<?php
require_once '../vendor/autoload.php';

echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">';

$connection = new mysqli('localhost','samuel','admin','php_mvc');
$connection->query("SET names 'utf8'");

$consulta = $connection->query("SELECT * FROM notas");
$numColumnas = $consulta->num_rows;

$paginator = new Zebra_Pagination();
$paginator->records($numColumnas);
$paginator->records_per_page(2);
$page = $paginator->get_page();

$offset= ($page-1)*2;
$notas = $connection->query("SELECT * FROM notas LIMIT $offset,2");
while($nota = $notas->fetch_object()){
    echo '<h1>'.$nota->titulo.'</h1>';
    echo $nota->descripcion. '<br/>';
}
$paginator->render();