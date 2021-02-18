<?php if(isset($prod)): ?>
  <h1><?=$prod->nombre?></h1>
    <div id="detail-product">
        <div class="image">
            <img src="<?=BASE_URL?>/uploads/images/<?=$prod->imagen?>"/>
        </div>
        <div class="data">
            <p class="description"><?=$prod->descripcion;?></p>
            <p class="price"><?=$prod->precio;?></p>
            <a href="<?=BASE_URL.'/carrito/add&id='.$prod->id?>" class="button">Comprar</a>
        </div>
<?php endif; ?>