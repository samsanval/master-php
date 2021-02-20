<h1>Mis pedidos</h1>
<?php while($pedido = $allPedidos->fetch_object()):?>
  Numero del pedido : <a href="<?=BASE_URL?>/pedido/detail&id=<?=$pedido->id?>"><?=$pedido->id?></a> <br/>
  Coste del pedido : <?=$pedido->coste?> <br/>
  Fecha del pedido : <?=$pedido->fecha?> <br/>
  <hr/>
<?php endwhile; ?>