<h1>Crear Categoria</h1>

<form action="<?=BASE_URL.'/categoria/save'?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    <input type="submit" value="Guardar"/>
</form>