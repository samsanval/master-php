<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Tienda Master</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/styles.css"/>
    </head>
    <body>
        <header id="header">
            <div id="logo">
                <img src="<?=BASE_URL?>/assets/img/camiseta.png"/>
                <a href="index.php">
                    <h1>Tienda de camisetas</h1>
                </a>
            </div>
        </header>
        <?php $categorias = Utils::showCategories(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="#"><?=$cat->nombre?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </nav>
        <div id="content">