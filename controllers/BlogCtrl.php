<?php

namespace Controller;

use MVC\Router;
use Model\Blog;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogCtrl {

    public static function blog(Router $router) {

        $entradas = Blog::getAll();

        // debuguear($entradas);

        $router->view('paginas/blog', [

            'entradas' => $entradas
        ]);
    }

    public static function entrada(Router $router) {

        $id = validarId('/blog');
        $entrada = Blog::get($id);

        if (!$entrada) header('Location: /blog');

        $router->view('paginas/entrada', [
            'entrada' => $entrada
        ]);
    }


    public static function crear(Router $router) {

        $entrada = new Blog;
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $entrada = new Blog($_POST['entrada']);
    
            $imagen = $_FILES['entrada']['tmp_name']['imagen'];
            if ($imagen) {
                $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
                $entrada->setImagen($nombreImagen);
            }
    
            $errores = $entrada->validar();
            if (empty($errores)) {
    
                if ($imagen) {
                    if (!is_dir(CARPETA_IMG)) mkdir(CARPETA_IMG); 
                    $manager = new ImageManager(Driver::class);
                    $manager -> read($imagen) -> cover(800,600)
                             -> save(CARPETA_IMG . $nombreImagen);
                }
                $entrada->guardar();
            }
        }

        $router->view('blog/crear', [

            'entrada' => $entrada,
            'errores' => $errores
        ]);
    }


    public static function actualizar(Router $router) {

        $id = validarId('/admin');

        $entrada = Blog::get($id);
        if (!$entrada) header('Location: /admin');
        
        $errores = Blog::getErrores();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['entrada'];
            $entrada->sincronizar($args); // Actualiza cambios

            $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
            $imagen = $_FILES['entrada']['tmp_name']['imagen'];
            if ($imagen) $entrada->setImagen($nombreImagen);

            $errores = $entrada->validar();
            if (empty($errores)) {

                if ($imagen) {
                    $manager = new ImageManager(Driver::class);
                    $manager -> read($imagen) -> cover(800,600)
                            -> save(CARPETA_IMG . $nombreImagen);
                }

                $entrada->guardar();
            }
        }

        $router->view('blog/actualizar', [
            'entrada' => $entrada,
            'errores' => $errores
        ]);
    }


    public static function eliminar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            if ($id) {

                if ($_POST['tipo'] === 'entrada') {

                    $entrada = Blog::get($id);
                    if ($entrada) $entrada->eliminar();
                }
            }
        }
    }
}