<?php require_once('helpers/helpers.php')?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog Master</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    </head>
    <body>
        <header id="cabecera">
            <!-- Cabecera -->
            <div id="logo">
               <a href="index.php">
                   Blog de videojuegos
              </a>
          </div>
          <nav id="menu">
              <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php $categorias = getCategorias($db);?>
                <?php if(!empty($categorias)) : ?>
                    <?php while(($categoria = mysqli_fetch_assoc($categorias))): ?>
                    <li><a href="categoria.php?id=<?= $categoria['id'];?>"><?php echo $categoria['nombre']; ?></a></li>

                    <?php endwhile; ?>
                <?php endif; ?>
                <li><a href="index.php">Sobre nosotros</a></li>
                <li><a href="index.php">Contacto</a></li>
              </ul>
          </nav>
     </header>
     <div id="contenedor">