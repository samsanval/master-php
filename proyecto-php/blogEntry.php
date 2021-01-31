<?php require_once('includes/conexion.php'); ?>
<?php require_once('helpers/helpers.php'); ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>
<?php
    $entrada = getEntry($db,$_GET['id']);
    if(empty($entrada)):
        header('Location:index.php');
    endif;
?>
<div id="principal">
    <h1><?= $entrada['titulo']; ?></h1>
    <a href="categoria.php?id=<?=$entrada['categoria_id']?>">
        <h2><?= $entrada['categoriaNombre']; ?></h2>
    </a>
    <h4><?= $entrada['fecha'] . ' | ' . $entrada['autor'];?></h4>
    <p><?= $entrada['description'];?></p>
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada['usuario_id']):?>
        <a href="editEntry.php?id=<?=$entrada['id'];?>" class="boton">Editar entrada</a>
        <a href="deleteEntry.php?id=<?=$entrada['id'];?>" class="boton boton-rojo">Eliminar entrada</a>
    <?php endif; ?>
</div>