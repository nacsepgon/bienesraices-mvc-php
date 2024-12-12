<main class="contenedor seccion contenido-centrado">
    
    <a href="/blog" class="boton boton-verde">Volver</a>

    <h1><?php echo $entrada->titular ?></h1>

    <img
        loading="lazy"
        src="/imagenes/<?php echo $entrada->imagen?>"
        alt="imagen entrada blog"
    >

    <p class="info-entrada">Escrito el <span><?php echo $entrada->creado ?></span> por <span><?php echo $entrada->autor ?></span></p>

    <div class="resumen-entrada">

        <p><?php echo $entrada->texto ?></p> 
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor repellendus fugiat inventore atque, velit quas animi harum nisi alias, excepturi magnam accusantium labore omnis molestias sunt cumque quod voluptas! Pariatur.</p>
        <p>Suspendisse tristique, mi a porttitor hendrerit, leo ligula placerat nulla, ut mattis leo dui a tortor. In hac habitasse platea dictumst. Cras nec lobortis sapien, eu posuere nibh. Aliquam eget nisi non sapien vestibulum aliquet.</p>
        
    </div>

</main>