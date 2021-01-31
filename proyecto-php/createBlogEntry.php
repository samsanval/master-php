<?php require_once('includes/conexion.php'); ?>
<?php require_once('includes/header.php'); ?>
<div id="principal">
    <h1>Crear entrada de blog</h1>
    <p>
        Añada nueva entrada a blog
    </p>
    <br/>
    <form action="insertBlogEntry.php" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo"/>
        <label for="description">Descripción de la entrada</label>
        <textArea id="entradaBlog" name="description">
        </textArea>
        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = getCategorias($db);
                while(($categoria = mysqli_fetch_assoc($categorias))):?>
                    <option value="<?= $categoria['id'];?>"><?= $categoria['nombre']; ?></option>
                <?php endwhile;?>
        </select>
        <input type="submit" value="Guardar"/>
    </form>
</div>