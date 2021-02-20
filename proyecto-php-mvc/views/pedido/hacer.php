<?php if(isset($_SESSION['login'])): ?>
  <h1>Hacer pedido</h1>
  <p>
  <a href="<?=BASE_URL?>/carrito/index">Ver los productos y el precio del pedido</a>
  </p>
  <br/>
  <form action="<?=BASE_URL?>/pedido/add" method="POST">
    <h3>Dirección del envío</h3>
    <label for="provincia">Provincia</label>
    <input type="text" name="provincia"/>
    <label for="ciudad">Ciudad</label>
    <input type="text" name="ciudad"/>
    <label for="direccion">Direccion</label>
    <input type="text" name="direccion"/>
    <input type="submit" value="Confirmar"/>
  </form>
<?php else: ?>
  <h1>Necesitas loguearte para tramitar el pedido</h1>
  <p>Haga login por favor</p>
<?php endif; ?>