<h1>Usuarios</h1>
<?php while($userList = $usuarios->fetch_object()): ?>
    <?=$userList->nombre;?>
<?php endwhile; ?>