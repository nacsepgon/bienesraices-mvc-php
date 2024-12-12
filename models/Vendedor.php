<?php declare (strict_types=1);

namespace Model;

class Vendedor extends Active {

    protected static $tabla = 'vendedores',
    $columnas = ['id', 'nombre', 'apellido', 'telefono', 'correo', 'imagen'];

    public $id, $nombre, $apellido, $telefono, $correo, $imagen;

    public function __construct($args = []) {

        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->imagen = '';

    }


    public function validar() {

        if (!$this->nombre) self::$errores[] = 'Debes añadir un nombre';

        if (!$this->apellido) self::$errores[] = 'El apellido es obligatorio';

        if (!$this->telefono) self::$errores[] = 'El número telefónico es obligatorio.';

        if (!$this->correo) self::$errores[] = 'El correo es obligatorio.';

        if (!$this->imagen) self::$errores [] = 'Debes subir una imagen de la propiedad.';

        // Expresiones regulares
        // if (!preg_match('/[0-9]{9}/', $this->telefono)) { // Extensión fija // de 9 dígitos mínimo y del 0 al 9
        if (!preg_match('/^[0-9]{9}+$/', $this->telefono)) { // Extensión fija // de 9 dígitos y del 0 al 9
            
            self::$errores[] = 'Número telefónico no es válido.';
        }

        return self::$errores;
    }

}