<?php declare (strict_types=1);

namespace Model;

class Active {

    protected static $db, // Conexión a DB
    $columnas = [],
    $errores = [],
    $tabla = 'a';

    public static  function setDB($database) {
        self::$db = $database; // Propiedad::$db
    }

    public function guardar() { 
        if (!is_null($this->id)) { // En actualizar hay id, en crear no
            $this->actualizar();
            header('Location: /admin?Subida=2');
        }
        else {
            $this->crear();
            header('Location: /admin?Subida=1');
        }
    }

    public function crear() {
  
        $atributos = $this->sanitizar();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos)); // Convierte array a string
        $query .= " ) VALUES ( '";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        return self::$db->query($query);
    }

    public function actualizar () {

        $atributos = $this->sanitizar();
        $valores = [];
        
        foreach($atributos as $key => $value) {
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = " . self::$db->escape_string($this->id); // No se había sanitizado id
        $query .= " LIMIT 1";

        return self::$db->query($query);
    }

    public function eliminar() {
       
        $query = "DELETE FROM " . static::$tabla . " WHERE id = ";
        $query .= self::$db->escape_string($this->id);
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->delImagen();
            header('Location: /admin?Subida=3');
        }
    }

    // Escapa inyecciones maliciosas
    protected function sanitizar() : array {

        $atributos = $this->atributos();
        $sanitizado = [];
            
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Identifica y une columnas de la DB
    protected function atributos() : array {
        
        $atributos = []; // Arreglo asociativo

        foreach (static::$columnas as $columna) {

            if ($columna === 'id') continue;

            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }
    
    // Subida
    public function setImagen($imagen) {
        // Eliminar imagen previa
        if (!is_null($this->id)) $this->delImagen();
        
        if ($imagen) $this->imagen = $imagen;
    }

    protected function delImagen() {

        if (file_exists(CARPETA_IMG .  $this->imagen)) {
            unlink(CARPETA_IMG .  $this->imagen);
        }
    }

    // Validación
    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        // static::$errores = [];
        return static::$errores;
    }

    public static function getAll() {

        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultaSQL($query);

        return $resultado;
    }

    public static function getSome($limit = 3) {

        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limit;

        $resultado = self::consultaSQL($query);

        return $resultado;
    }

    public static function get($id) {

        $query = "SELECT * FROM " . static::$tabla . " WHERE id= {$id}";

        $resultado = self::consultaSQL($query);

        return array_shift($resultado); // Elemento en primera posición del array ($resultado[0])        
    }

    protected static function consultaSQL($query) {
        // Consulta
        $resultado = self::$db->query($query);

        // Itera
        $array = [];
 
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free(); // Liberar memoria

        return $array;
    }
    
    protected static function crearObjeto($registro) {
        
        $objeto = new static; // Construye objeto con llaves y sin valores

        foreach ($registro as $key => $value) {

            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza objeto en memoria con los cambios realizados
    public function sincronizar( $args = [] ) {

        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

}