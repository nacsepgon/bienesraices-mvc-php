<?php declare (strict_types=1);

namespace Model;

class Propiedad extends Active {
    
    protected static $tabla = 'propiedades',
    $columnas = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];


    public $id, $titulo, $precio, $imagen, $descripcion, $habitaciones, $wc, $estacionamiento, $creado, $vendedorId; // PHP 7

    public function __construct($args = []) {
        // $this-> solo para public
        $this->id = $args['id'] ?? null; // Le cambié '' por null
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y-m-d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {

        if (!$this->titulo) self::$errores[] = 'Debes añadir un título.';

        if (!$this->precio) self::$errores[] = 'El precio es obligatorio.';

        if (strlen($this->descripcion) < 50 ) self::$errores[] = 'La descripción debe contener 50 ó más carácteres.';

        if (!$this->habitaciones) self::$errores[] = 'El número de habitaciones es obligatorio.';

        if (!$this->wc) self::$errores[] = 'El número de baños es obligatorio.';

        if (!$this->estacionamiento) self::$errores[] = 'El número de estacionamientos es obligatorio.';

        if (!$this->vendedorId) self::$errores[] = 'Escoge un/a vendedor/a.';

        if (!$this->imagen) { self::$errores [] = 'Debes subir una imagen de la propiedad.'; }

        return self::$errores;
    }
    

   
}