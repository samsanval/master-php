<h1>Gestionar Categorias</h1>
<a href="<?=BASE_URL.'/categoria/create'?>" class="button-small">Crear categoria</a>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Categoria</th>
    </tr>
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td>
        <?=$cat->id?>
        </td>
        <td>
        <?=$cat->nombre?>
        </td>
    </tr>
<?php endwhile; ?>
</table>