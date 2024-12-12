<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <?php foreach ($entradas as $entrada) { ?>

        <article class="entrada-blog">
            <div class="imagen">
                <img
                    loading="lazy"
                    src="/imagenes/<?php echo $entrada->imagen?>"
                    alt="imagen entrada blog"
                >
            </div>
            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $entrada->id ?>">
                    <h4><?php echo $entrada->titular ?></h4>
                </a>
                <p class="info-entrada">Escrito el <span><?php echo $entrada->creado ?></span> por <span><?php echo $entrada->autor ?></span></p>
                <p><?php echo $entrada->texto ?></p>
            </div>
        </article>
    <?php } ?>

</main>