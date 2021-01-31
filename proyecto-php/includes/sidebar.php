<?php require_once 'helpers/helpers.php'; ?>
<aside id="sidebar">
            <div id="buscador" class="bloque">
                <h3>Buscar</h3>
                <form action="search.php" method="POST">
                <input type="text" name="busqueda"/>
                <input type="submit" value="Buscar" />
                </form>
            </div>
             <?php if(isset($_SESSION['usuario'])) :?>
            <div id="mensaje" class="bloque">
                <h3><?=$_SESSION['usuario']['nombre'] . ' '. $_SESSION['usuario']['apellidos']; ?></h3>
                <a href="createBlogEntry.php" class=" boton boton-verde">Crear Entrada</a>
                <a href="createCategory.php" class="boton">Crear Categoria</a>
                <a href="myData.php" class="boton boton-naranja">Mis datos</a>
                <a href="logout.php" class="boton boton-rojo">Logout</a>
            </div>
            <?php else: ?>
             <div id="login" class="bloque">
                 <h3>Identificate</h3>
                 <form action="login.php" method="POST">
                     <label for="email">Email</label>
                     <input type="email" name="email"/>
                     <label for="password">Password</label>
                     <input type="password" name="password"/>
                     <input type="submit" name="login" value="Login"/>
                 </form>
             </div>
             <div id="register" class="bloque">
                 <h3>Registrarse</h3>
                 <form action="register.php" method="POST">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre"/>
                     <?php echo isset($_SESSION['errores']['nombre']) ? showErrors($_SESSION['errores'], 'nombre' ): ''; ?>
                     <label for="apellidos">Apellidos</label>
                     <input type="text" name="apellidos"/>
                     <?php echo isset($_SESSION['errores']['apellidos']) ? showErrors($_SESSION['errores'] ,'apellidos'): '' ; ?>
                     <label for="email">Email</label>
                     <input type="email" name="email"/>
                     <?php echo isset($_SESSION['errores']['email']) ? showErrors($_SESSION['errores'] ,'email' ): ''; ?>
                     <label for="password">Password</label>
                     <input type="password" name="password"/>
                     <?php echo isset($_SESSION['errores']['password']) ? showErrors($_SESSION['errores'], 'password' ): ''; ?>
                     <input type="submit" name="submit" value="Registrar"/>
                     <?php echo isset($_SESSION['insert']) ? $_SESSION['insert'] : ' '; ?>
                     <?php echo isset($_SESSION['errores']) ? deleteErrors() : ' '; ?>

                 </form>
             </div>
             <?php endif; ?>
         </aside>