<?php require_once('includes/conexion.php'); ?>
<?php require_once('helpers/helpers.php'); ?>
<?php if(!isset($_POST)):
    header('Location:index.php');
endif;?>
<?php $entradas = getEntriesBySearch($db,$_POST['busqueda']);
 if (empty($entradas)):
 header('Location:index.php');
endif; ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<div id="principal">
    <h1>Entradas Encontradas</h1>
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
</div>