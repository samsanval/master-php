<h1>Gestionar Productos</h1>
<a href="<?=BASE_URL.'/producto/create'?>" class="button-small">Crear producto</a>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>

    </tr>
<?php while($prod = $productos->fetch_object()): ?>
    <tr>
        <td>
        <?=$prod->id?>
        </td>
        <td>
        <?=$prod->nombre?>
        </td>
        <td>
        <?=$prod->precio?>
        </td>
        <td>
        <?=$prod->stock?>
        </td>
        <td>
            <a class="button button-gestion" href="<?=BASE_URL.'/producto/edit&id='.$prod->id?>">Editar</a>
            <a class="button button-gestion button-red" href="<?=BASE_URL.'/producto/delete&id='.$prod->id?>">Eliminar</a>

        </td>
    </tr>
<?php endwhile; ?>
</table>