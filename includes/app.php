<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use Model\Active;

$db = conectarDB();

Active::setDB($db);