<aside id="lateral">
                <div id="carrito">
                    <h3>Mi carrito</h3>
                    <ul>
                        <li><a href="<?=BASE_URL?>/carrito/index">Ver el carrito</a></li>
                        <li><a href="<?=BASE_URL?>/carrito/index">Productos totales (<?=Utils::statsCarrito()['count']?>)</a></li>
                        <li><a href="<?=BASE_URL?>/carrito/index">Total (<?=Utils::statsCarrito()['total']?> €)</a></li>


                    </ul>
                </div>
                <div id="login" class="block_aside">
                <?php if(!isset($_SESSION['login']) || $_SESSION['login'] == 'failed' ): ?>
                    <h3>Entrar en la web</h3>
                    <form action="<?=BASE_URL.'/usuario/login'?>" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password"/>
                        <input type="submit" value="Enviar"/>
                    </form>
                <?php elseif ($_SESSION['login'] == 'successed') : ?>
                    <h3>Logueado correctamente</h3>
                    <form action="<?=BASE_URL.'/usuario/unlogin'?>" method="post">
                    <input type="submit" value="Cerrar Sesión"/>
                    </form>
                <?php endif; ?>
                </div>
                <ul>
                <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 'successed'): ?>
                    <li><a href="<?=BASE_URL?>/pedido/view">Mis pedidos</a></li>
                    <li><a href="<?=BASE_URL.'/producto/gestion'?>">Gestionar productos</a></li>
                    <li><a href="<?=BASE_URL?>/pedido/viewAll">Gestionar pedidos</a></li>
                    <li><a href="<?=BASE_URL.'/categoria/index'?>">Gestionar categorias</a></li>
                <?php endif; ?>
                </ul>
                <a href="<?=BASE_URL.'/usuario/registerUser'?>">Registrar usuario</a>
            </aside>
            <div id="central">