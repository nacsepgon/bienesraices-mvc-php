<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesión</h1>

    <?php foreach($errores as $error) { ?>
        <div class="alerta error"><?php echo $error ?></div>
    <?php } ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Correo y contraseña</legend>

            <label for="correo">Correo</label>
            <input type="email" name="login[email]" "email" id="correo" placeholder="mariaperez24@correo.cl" value="<?php echo $auth->email ?>" required>

            <label for="clave">Contraseña</label>
            <input type="password" name="login[password]" id="clave" placeholder="*******" value="<?php echo $auth->password ?>" required>

        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>