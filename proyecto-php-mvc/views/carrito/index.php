<h1>Productos del carrito</h1>

<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
  </tr>
  <?php foreach($carrito as $indice => $producto):
    $prod = $producto['producto'];
    ?>
    <tr>
      <td><img src="<?=BASE_URL.'/uploads/images/'.$prod->imagen?>"class="img_carrito"/></td>
      <td><?=$prod->nombre;?></td>
      <td><?=$producto['precio'];?></td>
      <td><?=$producto['unidades'];?></td>
    </tr>
  <?php endforeach; ?>
</table>
<h3 class="total-carrito">Precio total: <?=Utils::statsCarrito()['total'];?> €</h3>
<a href="" class="button-pedido">Tramitar pedido</a>