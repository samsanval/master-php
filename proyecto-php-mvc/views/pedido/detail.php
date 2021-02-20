<h1>Detalle del pedido</h1>
<?php if(isset($_SESSION['admin'])): ?>
<h3>Cambiar estado del pedido</h3>
  <form action="<?=BASE_URL?>/pedido/updateStatus" method="POST">
  <input type="hidden" value="<?=$pedido->id?>" name="pedidoId"/>
  <select name="estado">
  <option value="confirm">Pendiente</option>
  <option value="preparation">En preparación</option>
  <option value="ready">Listo</option>
  <option value="sent">Enviado</option>
  <input type="submit" value="Actualizar"/>
  </select>
  </form>
  <br/>
<?php endif; ?>
Estado : <?=$pedido->estado?> <br/>
Numero del pedido : <?=$pedido->id?> <br/>
  Coste del pedido : <?=$pedido->coste?> <br/>
  Fecha del pedido : <?=$pedido->fecha?> <br/>
  <hr/>

<h2>Productos</h2>
<?php while($producto = $productos->fetch_object()): ?>
    Producto: <?=$producto->nombre; ?>
    Precio: <?=$producto->precio; ?>
    Unidades: <?=$producto->unidades; ?>
<?php endwhile; ?>