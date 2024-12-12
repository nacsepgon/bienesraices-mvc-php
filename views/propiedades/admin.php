<main class="contenedor seccion">
    <h1>Administrador de bienes raíces</h1>

    <?php if ($subida) {
        
        $msj = notificar( intval($subida) );

        if ($msj) { ?>

            <p class="alerta exito"><?php echo esc($msj) ?></p>

        <?php }
    }?>

    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
    <a href="/vendedores/crear" class="boton boton-naranjo">Vendedor/a nuevo/a</a>
    <a href="/entradas/crear" class="boton boton-naranjo">Entrada de blog nueva</a>
    
    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead> <!-- Table head -->
            <tr> <!-- Table row -->
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Resultados consulta -->
            <?php foreach ($propiedades as $propiedad) { ?>
                <tr class="propiedades-tr">
                    <td><?php echo $propiedad->id ?></td>
                    <td><?php echo $propiedad->titulo ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla" alt="imagen propiedad"></td>
                    <td>$<?php echo $propiedad->precio ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton-naranjo-block">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) { ?>
                <tr class="propiedades-tr">
                    <td><?php echo $vendedor->id ?></td>
                    <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido ?></td>
                    <td><?php echo $vendedor->telefono ?></td>
                    <td><?php echo $vendedor->correo ?></td>
                    <td><img src="/imagenes/<?php echo $vendedor->imagen ?>" class="imagen-tabla" alt="imagen vendedor/a"></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="boton-naranjo-block">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <h2>Blog</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titular</th>
                <th>Texto</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada) { ?>
                <tr class="propiedades-tr">
                    <td><?php echo $entrada->id ?></td>
                    <td><?php echo $entrada->titular ?></td>
                    <td><?php echo $entrada->texto ?></td>
                    <td>
                        <img
                            loading="lazy"
                            src="/imagenes/<?php echo $entrada->imagen?>"
                            alt="imagen entrada blog"
                        >
                    </td>
                    <td><?php echo $entrada->autor ?></td>
                    <td><?php echo $entrada->creado ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/entradas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $entrada->id ?>">
                            <input type="hidden" name="tipo" value="entrada">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="entradas/actualizar?id=<?php echo $entrada->id ?>" class="boton-naranjo-block">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>