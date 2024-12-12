<fieldset>
    <legend>Información general</legend>

    <label for="titular">Titular</label>
    <input type="text" id="titular" name="entrada[titular]" placeholder="Nuevas formas de vivir" value='<?php echo esc("$entrada->titular") ?>'>

    <label for="texto">Texto</label>
    <textarea id="texto" name="entrada[texto]" placeholder="Había una vez..."><?php echo esc("$entrada->texto") ?></textarea>


    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="entrada[imagen]" accept="image/jpeg, image/png, image/webp">

    <?php if ($entrada->imagen) { ?>
        <img
            loading="lazy"
            src="/imagenes/<?php echo $entrada->imagen?>"
            alt="imagen entrada blog"
            class="imagen-edit"
        >
    <?php } ?>

    <label for="autor">Autor</label>
    <input type="text" id="autor" name="entrada[autor]" placeholder="María Donoso" value='<?php echo esc("$entrada->autor") ?>'>

</fieldset>