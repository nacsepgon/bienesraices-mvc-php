<div class="contenedor-anuncios">
    
    <?php foreach ($anuncios as $anuncio) { ?>

        <div class="anuncio">

            <picture>
                <!-- <source srcset="build/img/anuncio1.webp" type="image/webp"> -->
                <img loading="lazy" src="imagenes/<?php echo $anuncio->imagen ?>" alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $anuncio->titulo ?></h3>
                <p><?php echo $anuncio->descripcion ?></p>
                <p class="precio">$<?php echo $anuncio->precio ?></p>
                <ul class="iconos-prestaciones">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $anuncio->habitaciones ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $anuncio->wc ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $anuncio->estacionamiento ?></p>
                    </li>
                </ul>
                <a href="/anuncio?id=<?php echo $anuncio->id ?>" class="boton-naranjo-block"> Ver propiedad </a>
            </div> <!-- contenido anuncio -->
        </div> <!-- anuncio -->

    <?php } ?>

</div>