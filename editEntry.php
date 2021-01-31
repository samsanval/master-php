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
<form action="updateEntry.php?id=<?=$entrada['id'];?>" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" value="<?= $entrada['titulo'];?>" name="titulo"/>
        <label for="description">Descripción de la entrada</label>
        <textArea id="entradaBlog" name="description">
            <?=$entrada['description'];?>
        </textArea>
        <label for="categoria">Categoria</label>
        <select name="categoria" value="<?= $entrada['categoria_id'];?>">
            <?php $categorias = getCategorias($db);
                while(($categoria = mysqli_fetch_assoc($categorias))):?>
                <?= $categoria['id'] === $entrada['categoria_id'] ? 'selected="selected"' : ''?>
                    <option value="<?= $categoria['id'];?>"><?= $categoria['nombre']; ?></option>
                <?php endwhile;?>
        </select>
        <input type="submit" value="Editar"/>
    </form>
</div>