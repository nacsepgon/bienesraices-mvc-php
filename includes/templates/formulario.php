<fieldset>
    <legend>Información general</legend>

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Casa de vidrio" value="<?php echo esc("$propiedad->titulo") ?>">

    <label for="precio">Precio</label>
    <input type="number" id="titulo" name="propiedad[precio]" min=10000000 max=999999999 step=1000000 placeholder=149990000 value="<?php echo esc("$propiedad->precio") ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-edit" alt="imagen propiedad">
    <?php } ?>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Grandes habitáculos y vista al mar"><?php echo esc("$propiedad->descripcion") ?></textarea>
</fieldset>
<fieldset>
    <legend>Información de la propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" min=1 max=9 placeholder=3 value="<?php echo esc("$propiedad->habitaciones") ?>">

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" min=1 max=9 placeholder=2 value="<?php echo esc("$propiedad->wc") ?>">

    <label for="estacionamiento">Estacionamientos</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" min=1 max=9 placeholder=1 value="<?php echo esc("$propiedad->estacionamiento") ?>">
</fieldset>
<fieldset>
    <legend>¿Quién venderá?</legend>

    <label for="vendedor">Vendedor/a</label>

    <select name="propiedad[vendedorId]" id="vendedor">

        <option disabled selected value="">-- Selecciona --</option>

        <?php foreach ($vendedores as $vendedor) { ?>

            <option
                <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected ' : '' ?>

                value="<?php echo esc($vendedor->id) ?>">

                <?php echo esc($vendedor->nombre) . ' ' . esc($vendedor->apellido) ?>
            </option>

        <?php } ?>

    </select>
</fieldset>