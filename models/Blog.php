<?php declare (strict_types=1);

namespace Model;

class Blog extends Active {

    protected static $tabla = 'entradas',
    $columnas = ['id', 'titular', 'autor', 'creado', 'texto', 'imagen'];

    public $id, $titular, $autor, $creado, $texto, $imagen;

    public function __construct($args = []) {

        $this->id = $args['id'] ?? null;
        $this->titular = $args['titular'] ?? '';
        $this->autor = $args['autor'] ?? '';
        $this->creado = date('Y-m-d');
        $this->texto = $args['texto'] ?? '';
        $this->imagen = '';

    }

    public function validar() {

        if (!$this->titular) self::$errores[] = 'Debes añadir un títular.';

        if (strlen($this->texto) < 50 ) self::$errores[] = 'La entrada debe contener 50 ó más carácteres.';

        if (!$this->autor) self::$errores[] = 'Debes especificar nombre o alias de autor/a.';

        if (!$this->imagen) { self::$errores [] = 'Debes subir una imagen de la entrada.'; }

        return self::$errores;
    }

}