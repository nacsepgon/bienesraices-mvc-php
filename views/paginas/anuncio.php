<a href="/anuncios" class="boton boton-verde">Volver a anuncios</a>

<main class="contenedor seccion contenido-centrado resumen-propiedad">

    

    <h1><?php echo $anuncio->titulo ?></h1>
    <p class="precio">$ <?php echo $anuncio->precio ?></p>

    <picture>
        <!-- <source srcset="build/img/destacada.webp" type="image/webp"> -->
        <img loading="lazy" src="imagenes/<?php echo $anuncio->imagen ?>" alt="imagen de propiedad">
    </picture>

    <div class="resumen-propiedad">
        
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

        <p><?php echo $anuncio->descripcion ?></p>
        
    </div>
</main>