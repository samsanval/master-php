    <?php require_once('includes/conexion.php'); ?>
    <?php require_once('includes/header.php'); ?>
        <?php require_once('includes/sidebar.php'); ?>
         <div id="principal">
             <h1>Ultimas entradas</h1>
             <?php $entradas = getEntradas($db); ?>
             <article class="entrada">
             <?php while(($entrada = mysqli_fetch_assoc($entradas))): ?>
                <h2><?php echo $entrada['titulo']; ?></h2>
                <span class="fecha">
                    <?php echo $entrada['nombre'].' | ' . $entrada['fecha'];?>
                </span>
                <p>
                    <?php echo substr($entrada['description'],0,100).'...'; ?>
                </p>
            <?php endwhile; ?>
             </article>
             <div id="ver-todas">
                 <a href="">Ver todas las entradas</a>
             <div class="clearfix"></div>
         </div>
     </div>
</body>
</html>