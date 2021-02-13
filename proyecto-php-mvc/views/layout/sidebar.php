<aside id="lateral">
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
                    <a href="<?=BASE_URL.'/usuario/registerUser'?>"></a>
                        <li><a href="#">Mis pedidos</a></li>
                    <li><a href="">Gestionar pedidos</a></li>
                    <li><a href="<?=BASE_URL.'/categoria/index'?>">Gestionar categorias</a></li>
                </ul>
            </aside>
            <div id="central">