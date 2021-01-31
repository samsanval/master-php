<?php require_once('includes/conexion.php'); ?>
<?php require_once('helpers/helpers.php'); ?>
<?php $entradas = getEntriesByCategory($db,$_GET['id']);
 if (empty($entradas)):
 header('Location:index.php');
endif; ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<div id="principal">
    <?php $categoria = getCategory($db,$_GET['id']); ?>
    <h1>Entradas de <?=$categoria['nombre']?></h1>        <article class="entrada">
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
</div>