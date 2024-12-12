<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Blog;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasCtrl {

    public static function index(Router $router) {

        $anuncios = Propiedad::getSome(6);
        $entradas = Blog::getSome(3);

        $router->view('paginas/index', [

            'inicio' => true,
            'anuncios' => $anuncios,
            'entradas' => $entradas
        ]);
    }


    public static function nosotros(Router $router) {
        $router->view('paginas/nosotros');
    }


    public static function anuncios(Router $router) {

        $anuncios = Propiedad::getAll(); 

        $router->view('paginas/anuncios', [
            'anuncios' => $anuncios
        ]);
    }

    public static function anuncio(Router $router) {

        $id = validarId('/anuncios');
        $anuncio = Propiedad::get($id);
        if (!$anuncio) header('Location: /anuncios');

        $router->view('paginas/anuncio', [

            'anuncio' => $anuncio
        ]);
    }


    public static function contacto(Router $router) {

        $msj = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // Instanciar PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP, Simple Mail Transfer Protocol
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'ca216353d53b7c';
            $mail->Password = '15878635708b23';
            $mail->SMTPSecure = 'tls'; // PHPMailer::ENCRYPTION_SMTPS = 'ssl'
            $mail->Port = 2525;

            // Destinatarios
            $mail->setFrom('admin@bienesraices.com'); // Quién envía
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); // Quién recibe
            $mail->Subject = 'Tienes un nuevo mensaje'; // Asunto

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Contenido
            $contenido ='<html><p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            
            // Campos condicionales
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió contacto telefónico:</p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p></html>';
            }
            else {
                $contenido .= '<p>Eligió contacto vía e-mail:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . '</p>';
            // $contenido .= '<p>Prefiere contacto por: ' . $respuestas['contacto'] . '</p>';
            
            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            // Enviar
            if ($mail->send()) $msj = 'Mensaje enviado con éxito';
            else $msj = 'No se pudo enviar mensaje';
        }

        $router->view('paginas/contacto', [

            'msj' => $msj
        ]);
    }
}