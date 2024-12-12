<?php
namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fun) { $this->rutasGET[$url] = $fun; }
    public function post($url, $fun) { $this->rutasPOST[$url] = $fun; }

    // Comprueba si la URL es válida
    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        $url = $_SERVER['PATH_INFO'] ?? '/';

        if (in_array($url, $rutas_protegidas) && !$auth) header('Location: /');


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $fun = $this->rutasGET[$url] ?? null;
        }
        else $fun = $this->rutasPOST[$url] ?? null;

        if ($fun) { // La URL existe

            call_user_func($fun, $this); // Ejecuta función de nombre dinámico
        }
        else debuguear('Página no encontrada.');

    }

    // Muestra vistas
    public function view($vista, $datos = []) {
        
        foreach ($datos as $key => $value) {

            $$key = $value; // variable de variable ($nombredekey)
        }

        ob_start(); // Comienza a almacenar en memoria (output buffer)
        
        include __DIR__ . "/views/$vista.php";

        $contenido = ob_get_clean(); // Pasa buffer a variable y deja de almacenar

        // Se inyecta contenido a página maestra
        include __DIR__ . "/views/layout.php";

    }

}