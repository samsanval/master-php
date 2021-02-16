<?php if(isset($cat)):?>
  <h1><?=$cat->nombre?></h1>
  <?php while($prod = $productos->fetch_object()): ?>
    <div class="product">
            <img src="<?=BASE_URL?>/uploads/images/<?=$prod->imagen?>"/>
            <h2><?=$prod->nombre;?></h1>
            <p><?=$prod->precio;?></p>
            <a href="#" class="button">Comprar</a>
  <?php endwhile; ?>
<?php endif; ?>