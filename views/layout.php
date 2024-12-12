<?php
    if (!isset($_SESSION)) session_start();
    
    $auth = $_SESSION['login'] ?? false;

    if (!isset($inicio)) $inicio = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                    <img src="../build/img/logo.svg" alt="Logotipo Bienes Raices">
                </a>

                <div class="menu-movil">
                    <img src="../build/img/barras.svg" alt="menu responsive">
                    
                </div>

                <div class="derecha">
                    <img class="boton-dark" src="../build/img/dark-mode.svg" alt="boton dark mode">
                    
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/anuncios">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth) { ?>
                            <a href="/logout">Cerrar sesión</a>
                        <?php } ?>
                    </nav>
                </div>

            </div>

            <?php if ($inicio) echo '<h1>Venta de casas y departamentos de lujo</h1>' ?>
        </div>
    </header>


    <?php echo $contenido ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
    </footer>
    
    <script src="../build/js/bundle.min.js"></script>

</body>
</html>