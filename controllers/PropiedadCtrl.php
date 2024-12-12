<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Blog;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PropiedadCtrl {

    public static function admin(Router $router) {

        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        $entradas = Blog::getAll();
        $subida = $_GET['Subida'] ?? null;
        
        // Selecciona ruta de la vista y le transfiere variables
        $router->view('propiedades/admin', [
            
            'propiedades' => $propiedades,

            'vendedores' => $vendedores,

            'entradas' => $entradas,

            'subida' => $subida
        ]);
    }


    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::getAll();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);

            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];

            if ($imagen) {
                $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad-> validar();

            if (empty($errores)) {

                if (!is_dir(CARPETA_IMG)) mkdir(CARPETA_IMG);

                $manager = new ImageManager(Driver::class);
                
                $manager -> read($imagen)
                         -> cover(800,600) // (Crop + Resize)
                         -> save(CARPETA_IMG . $nombreImagen);
                
                $propiedad->guardar(); // Guarda en DB
            }
        }

        $router->view('propiedades/crear', [

            'propiedad' => $propiedad,

            'vendedores' => $vendedores,

            'errores' => $errores

        ]);
    }


    public static function actualizar(Router $router) {

        $id = validarId('/admin');

        $propiedad = Propiedad::get($id);
        if (!$propiedad) header('Location: /admin');

        $vendedores = Vendedor::getAll();
        $errores = Propiedad::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            $errores = $propiedad->validar();
    
            $nombreImagen = md5( uniqid ( rand(), true ) ) . '.jpg';
    
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
    
            if ($imagen) $propiedad->setImagen($nombreImagen);
        
            if (empty($errores)) {
    
                if ($imagen) {
                    $manager = new ImageManager(Driver::class);
                    $manager -> read($imagen)
                             -> cover(800,600)
                             -> save(CARPETA_IMG . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->view('propiedades/actualizar', [

            'propiedad' => $propiedad,

            'vendedores' => $vendedores,

            'errores' => $errores

        ]);
    }


    public static function eliminar() { // Se queda en Admin sin hacer vista

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            if ($id) {

                if ($_POST['tipo'] === 'propiedad') {

                    $propiedad = Propiedad::get($id);
                    if ($propiedad) $propiedad->eliminar();
                }
            }
        }
    }
}