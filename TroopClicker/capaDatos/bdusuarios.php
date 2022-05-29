<?php

/**
 * bdusuarios.php
 * Módulo secundario que implementa la clase BDUsuarios.
 */
/** Incluye la clase base. */
include_once 'bdconexion.php';

/**
 * Declaración de la clase BDUsuarios.
 */
class BDUsuarios extends BDConexion
{

    /**
     * @var string Dirección de correo electrónico del usuario.
     * @access private 
     */
    private string $email;

    /**
     * @var string Contraseña del usuario.
     * @access private 
     */
    private string $contraseña;

    /**
     * @var string Nombre completo del usuario.
     * @access private 
     */
    private string $nombre;

    /**
     * @var int ID partidas del usuario.
     * @access private 
     */
    private ?int $idPartidas = null;

    /**
     * Método que inicializa el atributo email.
     * @access public
     * @param string $email Nombre del usuario.
     * @return void 
     */
    public function setEmail(string $email): void
    {
        /** Inicializa la propiedad. */
        $this->email = $email;
    }

    /**
     * Método que inicializa el atributo contraseña.
     * @access public
     * @param string $contraseña Nombre del usuario.
     * @return void 
     */
    public function setContraseña(string $contraseña): void
    {
        /** Inicializa la propiedad. */
        $this->contraseña = $contraseña;
    }

    /**
     * Método que inicializa el atributo nombre.
     * @access public
     * @param string $nombre Nombre del usuario.
     * @return void 
     */
    public function setNombre(string $nombre): void
    {
        /** Inicializa la propiedad. */
        $this->nombre = $nombre;
    }

    /**
     * Método que inicializa el atributo ID partidas del usuario.
     * @access public
     * @param int $idPartidas ID partidas del Usuario.
     * @return void 
     */
    public function setIdPartidas(int $idPartidas): void
    {
        /** Inicializa la propiedad. */
        $this->idPartidas = $idPartidas;
    }

    /**
     * Método que devuelve el valor del atributo email.
     * @access public
     * @return string Email del usuario.
     */
    public function getEmail(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->email;
    }

    /**
     * Método que devuelve el valor del atributo contraseña.
     * @access public
     * @return string Contraseña del usuario.
     */
    public function getContraseña(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->contraseña;
    }

    /**
     * Método que devuelve el valor del atributo nombre.
     * @access public
     * @return string Nombre completo del usuario.
     */
    public function getNombre(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->nombre;
    }

    /**
     * Método que devuelve el valor del atributo ID partidas del usuario.
     * @access public
     * @return int ID partidas del usuario.
     */
    public function getIdPartidas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->idPartidas;
    }

    /**
     * Método que comprueba si existe el usuario en la base de datos.
     * 
     * @access public
     * @return boolean True si existe el email del usuario y False en otro caso
     */
    public function existeUsuario(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** @var PDOStatement Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "SELECT *
					FROM Usuario
					WHERE email = :email"
            );
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':email', $this->email);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            if ($resultado->execute()) {
                /** Comprueba que el número de filas sea 1. */
                if ($resultado->rowCount() === 1) {
                    /** Existe el email del usuario. */
                    return true;
                }
            }
        }
        /** No existe el email del usuario. */
        return false;
    }

    /**
     * Método que valida un usuario en la base de datos.
     * 
     * @access public
     * @return boolean True si existe y False en otro caso
     */
    public function validaUsuario(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare("
				SELECT *
				FROM Usuario
				WHERE email = :email AND contraseña = :contrasena");
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':email', $this->email);
            $resultado->bindParam(':contrasena', $this->contraseña);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            $resultado->execute();
            /** Comprueba que el número de filas sea 1. */
            if ($resultado->rowCount() === 1) {
                /** Accede a los valores obtenidos. */
                $fila = $resultado->fetch();
                /** Inicializa los atributos del objeto. */
                $this->email = $fila['email'];
                $this->contraseña = $fila['contraseña'];
                $this->nombre = $fila['nombre'];
                $this->idPartidas = $fila['idPartidas'];

                /** Existe el usuario. */
                return (true);
            }
        }
        /** No existe el usuario. */
        return (false);
    }

    /**
     * Método que inserta un nuevo usuario en la base de datos
     * 
     * @access public
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function altaUsuario(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "INSERT INTO Usuario (email, contraseña, nombre)
					VALUES (:email, :contrasena, :nombre)"
            );
            /** Vincula los parámetros al nombre de variable especificado. */
            $resultado->bindParam(':email', $this->email);
            $resultado->bindParam(':contrasena', $this->contraseña);
            $resultado->bindParam(':nombre', $this->nombre);

            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            if ($resultado->execute()) {
                /** Devuelve true si se ha conseguido. */
                return true;
            }
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que elimina un usuario existente de la base de datos.
     * 
     * @access public
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function eliminaUsuario(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "DELETE FROM Usuario
					 WHERE email = :email"
            );
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':email', $this->email);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            if ($resultado->execute()) {
                /** Devuelve true si se ha conseguido. */
                return true;
            }
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que modifica los campos de un usuario de la base de datos.
     * 
     * @access public
     * @param string $emailOriginal Valor inicial del email del usuario.
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function modificaUsuario(string $emailOriginal, int $id): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "UPDATE Usuario
					 SET email = :email,
						contraseña = :contrasena,
						nombre = :nombre,
                        idPartidas = :idPartidas
					 WHERE email = :emailOriginal"
            );
            /** Vincula los parámetros a los nombre de variables especificado. */
            $resultado->bindParam(':email', $this->email);
            $resultado->bindParam(':contrasena', $this->contraseña);
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':idPartidas', $id);
            $resultado->bindParam(':emailOriginal', $emailOriginal);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            if ($resultado->execute()) {
                /** Devuelve true si se ha conseguido. */
                return true;
            }
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }
}
