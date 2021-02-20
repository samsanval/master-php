<h1>Productos del carrito</h1>
<?php if($_SESSION['carrito'] && count($_SESSION['carrito']) >= 1): ?>
<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
  </tr>
  <?php foreach($carrito as $indice => $producto):
    $prod = $producto['producto'];
    ?>
    <tr>
      <td><img src="<?=BASE_URL.'/uploads/images/'.$prod->imagen?>"class="img_carrito"/></td>
      <td><?=$prod->nombre;?></td>
      <td><?=$producto['precio'];?></td>
      <td>
      <?=$producto['unidades'];?>
       <a href="<?=BASE_URL?>/carrito/up&index=<?=$indice?>" class="button updown-unidades">+</a>
      <a href="<?=BASE_URL?>/carrito/down&index=<?=$indice?>" class="button updown-unidades">-</a>
      </td>
      <td><a href="<?=BASE_URL?>/carrito/remove&index=<?=$indice?>" class="button-red">Quitar producto</a></td>
    </tr>
  <?php endforeach; ?>
</table>
<div class="total-carrito">
  <h3 class="total-carrito">Precio total: <?=Utils::statsCarrito()['total'];?> €</h3>
  <a href="<?=BASE_URL?>/pedido/hacer" class="button-pedido">Tramitar pedido</a>
</div>
<div class="delete-carrito">
<a href="<?=BASE_URL?>/pedido/deleteAll" class="button-red">Vaciar carrito</a>
</div>
<?php else: ?>
<p>El carrito está vacío, añade algún producto</p>
<?php endif; ?>