<?php if(isset($edit)) : ?>
    <h1>Editar Producto</h1>
    <?php $urlAction = BASE_URL."/producto/update&id=".$prod->id; ?>
<?php else: ?>
<h1>Crear nuevos productos</h1>
<?php $urlAction = BASE_URL."/producto/save" ?>

<?php endif;?>

<form action="<?=$urlAction?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo (isset($prod)? $prod->nombre : '');?>" required/>
    <label for="categoria">Categoria</label>
    <select name="categoria" value="<?php echo (isset($prod)? $prod->categoria_id : '');?>">
        <?php $categorias = Utils::showCategories() ?>
        <?php while($cat = $categorias->fetch_object()): ?>
            <option value=<?=$cat->id; ?>><?=$cat->nombre;?></option>
        <?php endwhile;?>
    </select>
    <label for="description">Descripcion</label>
    <textarea name="descripcion" required> <?php echo (isset($prod)? $prod->descripcion : '');?> </textarea>
    <label for="precio">Precio</label>
    <input type="text" name="precio"  value="<?php echo (isset($prod)? $prod->precio : '');?>" required/>
    <label for="stock">Stock</label>
    <input type="number" name="stock"  value="<?php echo (isset($prod)? $prod->stock : '');?>" required/>
    <label for="imagen">Imagen</label>
    <?php if (isset($prod)) : ?>
    <?php echo '<img class="thumb" src="'.BASE_URL.'/uploads/images/'.$prod->imagen.'">'; ?>
    <?php endif; ?>
    <input type="file" name="imagen") required/>
    <input type="submit" value="Guardar"/>
</form>