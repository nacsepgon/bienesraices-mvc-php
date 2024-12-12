<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PropiedadCtrl;
use Controller\VendedorCtrl;
use Controller\PaginasCtrl;
use Controller\BlogCtrl;
use Controller\LoginCtrl;

$router = new Router;

//              URL,    [Controlador,           Método] 
$router->get('/admin', [ PropiedadCtrl::class, 'admin' ] );

$router->get('/propiedades/crear', [PropiedadCtrl::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadCtrl::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadCtrl::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadCtrl::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadCtrl::class, 'eliminar']);
$router->get('/vendedores/crear', [VendedorCtrl::class, 'crear']);
$router->post('/vendedores/crear', [VendedorCtrl::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorCtrl::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorCtrl::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorCtrl::class, 'eliminar']);
$router->get('/entradas/crear', [BlogCtrl::class, 'crear']);
$router->post('/entradas/crear', [BlogCtrl::class, 'crear']);
$router->get('/entradas/actualizar', [BlogCtrl::class, 'actualizar']);
$router->post('/entradas/actualizar', [BlogCtrl::class, 'actualizar']);
$router->post('/entradas/eliminar', [BlogCtrl::class, 'eliminar']);
// Zona privada ^

// Zona pública
$router->get('/', [PaginasCtrl::class, 'index']); 
$router->get('/nosotros', [PaginasCtrl::class, 'nosotros']); 
$router->get('/anuncios', [PaginasCtrl::class, 'anuncios']); 
$router->get('/anuncio', [PaginasCtrl::class, 'anuncio']); 
$router->get('/contacto', [PaginasCtrl::class, 'contacto']); 
$router->post('/contacto', [PaginasCtrl::class, 'contacto']); 

$router->get('/blog', [BlogCtrl::class, 'blog']);
$router->get('/entrada', [BlogCtrl::class, 'entrada']);

$router->get('/login', [LoginCtrl::class, 'login']);
$router->post('/login', [LoginCtrl::class, 'login']);
$router->get('/logout', [LoginCtrl::class, 'logout']);


$router->comprobarRutas();