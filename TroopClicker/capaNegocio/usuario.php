<?php

/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
include '../capaDatos/bdusuarios.php';

/**
 * Declaración de la clase Usuario
 */
class Usuario
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
     * @var int Id partidas del usuario.
     * @access private
     */
    private ?int $idPartidas = null;

    /**
     * Método que inicializa el atributo $email.
     *
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
     * Método que inicializa el atributo $contraseña.
     *
     * @access public
     * @param string $contraseña Contraseña del usuario.
     * @return void
     */
    public function setContraseña(string $contraseña): void
    {
        /** Inicializa la propiedad. */
        $this->contraseña = $contraseña;
    }

    /**
     * Método que inicializa el atributo $nombre.
     *
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
     * Método que inicializa el atributo $idPartidas.
     *
     * @access public
     * @param int $idPartidas Id partidas del usuario.
     * @return void
     */
    public function setIdPartidas(int $idPartidas): void
    {
        /** Inicializa la propiedad. */
        $this->idPartidas = $idPartidas;
    }

    /**
     * Método que devuelve el valor del atributo $email.
     *
     * @access public
     * @return string Email del usuario.
     */
    public function getEmail(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->email;
    }

    /**
     * Método que devuelve el valor del atributo $contraseña.
     *
     * @access public
     * @return string Contraseña del usuario.
     */
    public function getContraseña(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->contraseña;
    }

    /**
     * Método que devuelve el valor del atributo $nombre.
     *
     * @access public
     * @return string Nombre del usuario.
     */
    public function getNombre(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->nombre;
    }

    /**
     * Método que devuelve el valor del atributo $idPartidas.
     *
     * @access public
     * @return int Id partidas del usuario.
     */
    public function getIdPartidas(): int
    {
        /* Devuelve el valor de la propiedad. */
        return $this->idPartidas;
    }

    /**
     * Método que comprueba si existe el usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function existeUsuario(): bool
    {
        /** @var BDUsuarios Instancia un objeto de la clase. */
        $bdusuario = new BDUsuarios();
        /** Inicializa los atributos del objeto. */
        $bdusuario->setEmail($this->email);
        $bdusuario->setContraseña($this->contraseña);
        $bdusuario->setNombre($this->nombre);

        /** Comprueba si existe el usuario. */
        if ($bdusuario->existeUsuario()) {
            /** El usuario existe. */
            return true;
        }
        /** El usuario no existe. */
        return false;
    }

    /**
     * Método que añade un nuevo usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function almacenaUsuario(): bool
    {
        /** @var BDUsuarios Instancia un objeto de la clase. */
        $bdusuario = new BDUsuarios();
        /** Inicializa los atributos del objeto. */
        $bdusuario->setEmail($this->email);
        $bdusuario->setContraseña($this->contraseña);
        $bdusuario->setNombre($this->nombre);

        /** Inserta un nuevo usuario y comprueba un posible error. */
        if ($bdusuario->altaUsuario()) {
            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que valida un usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function validaUsuario(): bool
    {
        /** @var BDUsuarios Instancia un objeto de la clase. */
        $bdusuario = new BDUsuarios();
        /** Inicializa los atributos del objeto. */
        $bdusuario->setEmail($this->email);
        $bdusuario->setContraseña($this->contraseña);
        /** Comprueba si existe y gestiona un posible error. */
        if ($bdusuario->validaUsuario()) {
            /** Inicializa los atributos del objeto con los datos almacenados. */
            $this->nombre = $bdusuario->getNombre();
            $this->email = $bdusuario->getEmail();
            $this->contraseña = $bdusuario->getContraseña();
            $this->idPartidas = $bdusuario->getIdPartidas();

            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que modifica los datos de un usuario.
     *
     * @access public
     * @param string $emailOriginal Email original del usuario.
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function modificaUsuario(string $emailOriginal, int $id): bool
    {
        /** @var BDUsuarios Instancia un objeto de la clase. */
        $bdusuario = new BDUsuarios();
        /** Inicializa los atributos del objeto. */
        $bdusuario->setEmail($this->email);
        $bdusuario->setContraseña($this->contraseña);
        $bdusuario->setNombre($this->nombre);
        $bdusuario->setIdPartidas($id);


        /** Modifica los datos del usuario y comprueba un posible error. */
        if ($bdusuario->modificaUsuario($emailOriginal, $id)) {
            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que elimina un usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function eliminaUsuario(): bool
    {
        /** @var BDUsuarios Instancia un objeto de la clase. */
        $bdusuario = new BDUsuarios();
        /** Inicializa los atributos del objeto. */
        $bdusuario->setEmail($this->email);
        /** Elimina un usuario y comprueba un posible error. */
        if ($bdusuario->eliminaUsuario()) {
            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }
}
