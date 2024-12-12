<?php

namespace Model;

class Admin extends Active {

    protected static $tabla = 'usuarios',
    $columnas = ['id', 'email', 'password'];

    public $id, $email, $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {

        if (!$this->email) self::$errores[] = 'Debes ingresar un correo.';

        if (!$this->password) self::$errores[] = 'Escribe la contraseña.';

        return self::$errores;
    }

    public function existeUsuario() {

        $query = "SELECT * FROM " . self::$tabla;
        $query .= " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = 'Correo no registrado.';
            return;
        }
        return $resultado;
    }

    public function comprobarClave($resultado) {

        $user = $resultado->fetch_object();

        $pass = password_verify($this->password, $user->password); // Clave escrita, Clave hasheada

        if (!$pass) self::$errores[] = 'Clave incorrecta.';

        return $pass;
    }

    public function autenticar() {

        session_start();

        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }

}