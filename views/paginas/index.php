<main class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <?php include 'iconos.php' ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y departamentos en venta</h2>

    <?php include 'listado.php' ?>

    <div class="alinear-derecha">
        <a href="/anuncios" class="boton-verde">Ver todas</a>
    </div>
</section>


<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y nuestros asesores se pondrán en contacto contigo a la brevedad.</p>
    <a href="contacto" class="boton-naranjo">Contáctanos</a>
</section>


<div class="contenedor seccion seccion-inferior">

    <section class="blog">
        <h3>Nuestro Blog</h3>

        <?php foreach ($entradas as $entrada) { ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen?>" alt="imagen entrada blog">
                </div>
                <div class="texto-entrada">
                    <a href="/blog?id=<?php echo $entrada->id ?>">
                        <h4><?php echo $entrada->titular ?></h4>
                    </a>
                    <p class="info-entrada">Escrito el <span><?php echo $entrada->creado ?></span> por <span><?php echo $entrada->autor ?></span></p>
                    <p><?php echo $entrada->texto ?></p>
                </div>
            </article>
        <?php } ?>

    </section>

    <section class="testimonios">
        <h2>Testimonios</h2>
        <div class="testimonio">
            <blockquote>
                El personal me brindó una atención sublime y la casa en vivo se veía incluso mejor que en las fotos.
            </blockquote>
            <p>- Nicolás Charri</p>
        </div>
    </section>
</div>