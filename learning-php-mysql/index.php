<?php

$conexion = mysqli_connect('localhost','samuel','admin','php_mysql');
if(mysqli_connect_errno ()){
    echo 'La conexion a la base de datos MySQL ha fallado ', mysqli_connect_error();
}
else{
    echo 'Conexion realizada <br/>';
}
mysqli_query($conexion, "SET NAMES 'utf8'");
$query = mysqli_query($conexion, "SELECT * FROM notas");
while($nota = mysqli_fetch_assoc($query)){
    var_dump($nota);
}

//Insercion
$query_insert = "INSERT INTO notas values(null,'Nota desde PHP','La insertamos desde PHP','Verde')";
$insert = mysqli_query($conexion,$query_insert);
if($insert){
    echo "insercion correcta";
}
else{
    echo "error al insertar" . mysqli_error($conexion);
}
