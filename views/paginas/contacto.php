<main class="contenedor seccion contenido-centrado">
    <h1>Contáctanos</h1>

    <?php if ($msj) { ?>
        <p class='alerta exito'><?php echo $msj ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" method="POST">

        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="contacto[nombre]"
                placeholder="María Pérez"
                required
            >

            <label for="mensaje">Mensaje</label>
            <textarea
                id="mensaje"
                name="contacto[mensaje]"
                placeholder="Buenas, estoy buscando una casa con vista al mar."
                required
            ></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="opciones">¿Compra o vende?</label>
            <select
                id="opciones"
                name="contacto[tipo]"
                required
            >
                <option disabled selected>- Seleccione -</option>
                <option value="Compro">Compro</option>
                <option value="Vendo">Vendo</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input
                type="number"
                id="presupuesto"
                name="contacto[precio]"
                placeholder="$100,000,000"
                required
            >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Cómo desea que le contacten?</p>
            <div class="forma-contacto"> <!-- Radio buttons-->
                <label for="contacto-telefono">Teléfono</label>
                <input
                    name="contacto[contacto]"
                    type="radio"
                    value="telefono"
                    id="contacto-telefono" 
                    required                 
                >
                <label for="contacto-email">Correo</label>
                <input
                    name="contacto[contacto]"
                    type="radio"
                    value="correo"
                    id="contacto-email"
                    required
                >
            </div>

            <div class="contacto"></div> <!-- app.js -->

        </fieldset>

        <div class="forma-enviar">
            <input type="submit" value="Enviar" class="boton-verde">
        </div>

    </form>

</main>