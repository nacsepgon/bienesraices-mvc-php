<fieldset>
    <legend>Información general</legend>

    <label for="nombre">Nombre</label>
    <input
        type="text"
        id="nombre"
        name="vendedor[nombre]"
        placeholder="Laura"
        value="<?php echo esc("$vendedor->nombre") ?>"
    >
    <label for="apellido">Apellido</label>
    <input
        type="text"
        id="apellido"
        name="vendedor[apellido]"
        placeholder="Urra"
        value="<?php echo esc("$vendedor->apellido") ?>"
    >
</fieldset>

<fieldset>
    <legend>Contacto</legend>

    <label for="telefono">Teléfono</label>
    <input
        type="text"
        id="telefono"
        name="vendedor[telefono]"
        placeholder="91234578"
        value="<?php echo esc("$vendedor->telefono") ?>"
    >
    <label for="correo">Correo</label>
    <input
        type="email"
        id="correo"
        name="vendedor[correo]"
        placeholder="Urra"
        value="<?php echo esc("$vendedor->correo") ?>"
    >
</fieldset>

<fieldset>
    <legend>Imagen</legend>

    <label for="imagen">Subir foto de perfil</label>
    <input
        type="file"
        id="imagen"
        name="vendedor[imagen]"
        accept="image/jpeg, image/png"
    >
    <?php if ($vendedor->imagen) { ?>
        <img
            src="/imagenes/<?php echo $vendedor->imagen ?>"
            class="imagen-edit"
            alt="imagen vendedor/a"
        >
    <?php } ?>
</fieldset>