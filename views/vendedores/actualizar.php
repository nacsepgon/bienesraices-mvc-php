<main class="contenedor seccion">

    <h1>Actualizar vendedor/a</h1>

    <?php foreach($errores as $error) { ?>

        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php } ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        
        <?php include  __DIR__ . '/formulario.php' ?>

        <input type="submit" value="Actualizar vendedor/a" class="boton boton-naranjo">
    </form>

</main>