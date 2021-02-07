<h3><?=$nota->getTitulo();?></h3>
<h4><?=$nota->getDescription();?></h4>
<?php while($notaList = $notas->fetch_object()): ?>
    <?=$notaList->titulo . ' '.$notaList->fecha;?>
<?php endwhile; ?>