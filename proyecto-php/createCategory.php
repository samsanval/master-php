<?php require_once('includes/conexion.php'); ?>
<?php require_once('includes/header.php'); ?>
<div id="principal">
    <h1>Crear categorias</h1>
    <p>
        Añada nuevas categorias al blogs para las entradas
    </p>
    <br/>
    <form action="insertCategory.php" method="POST">
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" name="nombre"/>
        <input type="submit" value="Guardar"/>
    </form>
</div>