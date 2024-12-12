<?php

namespace Controller;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class VendedorCtrl {

    public static function crear(Router $router) {

        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST['vendedor']);
    
            $imagen = $_FILES['vendedor']['tmp_name']['imagen'];
            if ($imagen) {
                $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
                $vendedor->setImagen($nombreImagen);
            }
    
            $errores = $vendedor->validar();
            if (empty($errores)) {
    
                if ($imagen) {
                    if (!is_dir(CARPETA_IMG)) mkdir(CARPETA_IMG); 
                    $manager = new ImageManager(Driver::class);
                    $manager -> read($imagen) -> cover(800,600)
                             -> save(CARPETA_IMG . $nombreImagen);
                }
                $vendedor->guardar();
            }
        }

        $router->view('vendedores/crear', [

            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarId('/admin');

        $vendedor = Vendedor::get($id);
        if (!$vendedor) header('Location: /admin');
        
        $errores = Vendedor::getErrores();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args); // Actualiza cambios

            $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
            $imagen = $_FILES['vendedor']['tmp_name']['imagen'];
            if ($imagen) $vendedor->setImagen($nombreImagen);

            $errores = $vendedor->validar();
            if (empty($errores)) {

                if ($imagen) {
                    $manager = new ImageManager(Driver::class);
                    $manager -> read($imagen) -> cover(800,600)
                            -> save(CARPETA_IMG . $nombreImagen);
                }

                $vendedor->guardar();
            }
        }

        $router->view('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            if ($id) {

                if ($_POST['tipo'] === 'vendedor') {

                    $vendedor = Vendedor::get($id);
                    if ($vendedor) $vendedor->eliminar();
                }
            }
        }
    }
}