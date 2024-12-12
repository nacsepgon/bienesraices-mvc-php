<?php

namespace Controller;

use MVC\Router;
use Model\Admin;

class LoginCtrl {
    
    public static function login(Router $router) {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST['login']);

            $errores = $auth->validar();

            if (empty($errores)) {

                // Usuario existente?
                $resultado = $auth->existeUsuario();
                
                if (!$resultado) {
                    $errores = Admin::getErrores();
                }
                else {
                   // Clave válida?
                   $pass = $auth->comprobarClave($resultado);

                   if ($pass) {
                        $auth->autenticar();
                   }
                   else $errores = Admin::getErrores(); // Clave incorrecta
                }
            }
        }
        else $auth = new Admin;
        

        $router->view('auth/login', [

            'auth' => $auth,
            'errores' => $errores
        ]);
    }

    public static function logout() {

        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}