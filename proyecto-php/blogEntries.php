<?php require_once('includes/conexion.php'); ?>
    <?php require_once('includes/header.php'); ?>
        <?php require_once('includes/sidebar.php'); ?>
         <div id="principal">
             <h1>Ultimas entradas</h1>
             <?php $entradas = getEntradas($db); ?>
             <article class="entrada">
             <?php while(($entrada = mysqli_fetch_assoc($entradas))): ?>
                <a href="blogEntry.php?id=<?= $entrada['id'];?>">
                    <h2><?php echo $entrada['titulo']; ?></h2>
                </a>
                <span class="fecha">
                    <?php echo $entrada['nombre'].' | ' . $entrada['fecha'];?>
                </span>
                <p>
                    <?php echo substr($entrada['description'],0,100).'...'; ?>
                </p>
            <?php endwhile; ?>
             </article>
         </div>
     </div>
</body>
</html>