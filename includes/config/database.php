<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '1234', 'bienesraices_crud');

    if (!$db) {
        echo 'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;

}