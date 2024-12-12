<?php declare (strict_types=1);

define ('TEMPLATE_URL', __DIR__ . '/templates/');
define('CARPETA_IMG', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATE_URL . "{$nombre}.php";
}

function autenticado() : void {
    session_start();
    if (!$_SESSION['login']) header('location: /');
}

function debuguear($variable) : void {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

// Escapa HTML de inputs
function esc($html) : string {
    $esc = htmlspecialchars($html); // Prueba con <script>alert("hola")</script>
    return $esc;
}

function validarTipo($tipo) {
    $tipos = ['vendedor', 'propiedad', 'entrada'];
    return in_array($tipo, $tipos);
}

function notificar($codigo) { // Código de subida
    $msj = '';

    switch($codigo) {

        case 1: $msj = 'Subida exitosa';
        break;
        case 2: $msj = 'Actualización exitosa';
        break;
        case 3: $msj = 'Se ha eliminado';
        break;

        default: $msj = false;
    }

    return $msj;
}


function validarId(string $url) {

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    
    if (!$id) header("Location: $url");

    return $id;
}