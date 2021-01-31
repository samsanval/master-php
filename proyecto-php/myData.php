<<<<<<< HEAD
<?php require_once('includes/conexion.php'); ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<div id="principal">
<h3>Mis datos</h3>
    <form action="updateData.php" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" value="<?= $_SESSION['usuario']['nombre']?>" name="nombre"/>
    <label for="apellidos">Apellidos</label>
    <input type="text" value="<?= $_SESSION['usuario']['apellidos']?>" name="apellidos"/>
    <label for="email">Email</label>
    <input type="email" value="<?= $_SESSION['usuario']['email']?>" name="email"/>
    <label for="password">Password</label>
    <input type="password" name="password"/>
    <input type="submit" name="submit" value="Actualizar"/>
    </form>
=======
<?php require_once('includes/conexion.php'); ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<div id="principal">
<h3>Mis datos</h3>
    <form action="updateData.php" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" value="<?= $_SESSION['usuario']['nombre']?>" name="nombre"/>
    <label for="apellidos">Apellidos</label>
    <input type="text" value="<?= $_SESSION['usuario']['apellidos']?>" name="apellidos"/>
    <label for="email">Email</label>
    <input type="email" value="<?= $_SESSION['usuario']['email']?>" name="email"/>
    <label for="password">Password</label>
    <input type="password" name="password"/>
    <input type="submit" name="submit" value="Actualizar"/>
    </form>
>>>>>>> f013ca69da9a851f88ca380288d90cb2e14b7afe
</div>