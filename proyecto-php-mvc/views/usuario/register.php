<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register']=='completed'):?>
<?="<strong>Registro Completado</strong>"; ?>
<?php endif; ?>
?>
<?php Utils::deleteSession('register'); ?>
<form action="<?=BASE_URL?>/usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>
    <label for="email">Email</label>
    <input type="email" name="email" required/>
    <label for="password">Contraseña</label>
    <input type="password" name="password" required/>
    <input type="submit" value="Registrar"/>
</form>