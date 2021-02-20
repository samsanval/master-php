<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed'): ?>
  <h1>Pedido Confirmado</h1>
  <p>Tu pedido ha sido confirmado. Una vez realices la transferencia sera procesado y enviado<p>
  <br/>

  <h3>Datos del pedido</h3>
  <br/>


  Numero Del Pedido: <?=$lineaPedido->id?> <br/>
  Total a pagar: <?=$lineaPedido->coste?> <br/>
  Productos:
  <?php while($producto = $productosByPedido->fetch_object()): ?>
    <ul>

      <li><?=$producto->nombre?>, <?=$producto->precio?> €, <?=$producto->unidades?></li>
    </ul>

  <?php endwhile; ?>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
  <h1>FALLO</h1>
<?php endif; ?>