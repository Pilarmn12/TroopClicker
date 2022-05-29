<?php

/**
 * personaje.php
 * Módulo secundario que implementa la clase Personaje.
 */
/** Incluye la clase. */
include '../capaDatos/bdpersonaje.php';

/**
 * Declaración de la clase Partida
 */
class Personaje
{
    /** ATRIBUTOS * */
    /**
     * @var int Id partidas del usuario.
     * @access private
     */
    private int $idPartidas;

    /**
     * @var String Nombre del personaje.
     * @access private
     */
    private string $alias;

    /**
     * @var int Nivel del personaje.
     * @access private
     */
    private int $nivel;

    /**
     * @var int Experiencia del personaje.
     * @access private
     */
    private int $exp;

    /**
     * @var int Monedas del usuario.
     * @access private
     */
    private int $monedas;

    /**
     * @var int Nivel de fuerza del personaje.
     * @access private
     */
    private int $fuerza;

    /**
     * @var int Nivel de destreza del personaje.
     * @access private
     */
    private int $destreza;

    /**
     * @var int Nivel de carisma del personaje.
     * @access private
     */
    private int $carisma;

    /** SETTERS **/
    /**
     * Método que inicializa el atributo $idPartidas.
     *
     * @access public
     * @param int $idPartidas Id de partida del usuario.
     * @return void
     */
    public function setIdPartidas(int $idPartidas): void
    {
        /** Inicializa la propiedad. */
        $this->idPartidas = $idPartidas;
    }

    /**
     * Método que inicializa el atributo $alias.
     *
     * @access public
     * @param int $alias Nombre del personaje.
     * @return void
     */
    public function setAlias(string $alias): void
    {
        /** Inicializa la propiedad. */
        $this->alias = $alias;
    }

    /**
     * Método que inicializa el atributo $nivel.
     *
     * @access public
     * @param int $nivel Nivel del personaje.
     * @return void
     */
    public function setNivel(int $nivel): void
    {
        /** Inicializa la propiedad. */
        $this->nivel = $nivel;
    }

    /**
     * Método que inicializa el atributo $exp.
     *
     * @access public
     * @param int $exp Experiencia del personaje.
     * @return void
     */
    public function setExp(int $exp): void
    {
        /** Inicializa la propiedad. */
        $this->exp = $exp;
    }

    /**
     * Método que inicializa el atributo $monedas.
     *
     * @access public
     * @param int $monedas Monedas del usuario.
     * @return void
     */
    public function setMonedas(int $monedas): void
    {
        /** Inicializa la propiedad. */
        $this->monedas = $monedas;
    }

    /**
     * Método que inicializa el atributo $fuerza.
     *
     * @access public
     * @param int $fuerza Fuerza del personaje.
     * @return void
     */
    public function setFuerza(int $fuerza): void
    {
        /** Inicializa la propiedad. */
        $this->fuerza = $fuerza;
    }

    /**
     * Método que inicializa el atributo $destreza.
     *
     * @access public
     * @param int $destreza Destreza del personaje.
     * @return void
     */
    public function setDestreza(int $destreza): void
    {
        /** Inicializa la propiedad. */
        $this->destreza = $destreza;
    }

    /**
     * Método que inicializa el atributo $carisma.
     *
     * @access public
     * @param int $carisma Carisma del personaje.
     * @return void
     */
    public function setCarisma(int $carisma): void
    {
        /** Inicializa la propiedad. */
        $this->carisma = $carisma;
    }


    /** GETTERS * */
    /**
     * Método que devuelve el valor del atributo $idPartidas.
     *
     * @access public
     * @return int ID partidas del usuario.
     */
    public function getIdPartidas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->idPartidas;
    }

    /**
     * Método que devuelve el valor del atributo $alias.
     *
     * @access public
     * @return int Alias del personaje.
     */
    public function getAlias(): String
    {
        /** Devuelve el valor de la propiedad. */
        return $this->alias;
    }

    /**
     * Método que devuelve el valor del atributo $nivel.
     *
     * @access public
     * @return int Nivel del personaje.
     */
    public function getNivel(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->nivel;
    }


    /**
     * Método que devuelve el valor del atributo $exp.
     *
     * @access public
     * @return int Experiencia del personaje.
     */
    public function getExp(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->exp;
    }


    /**
     * Método que devuelve el valor del atributo $monedas.
     *
     * @access public
     * @return int Monedas del usuario.
     */
    public function getMonedas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->monedas;
    }

    /**
     * Método que devuelve el valor del atributo $fuerza.
     *
     * @access public
     * @return int Fuerza del personaje.
     */
    public function getFuerza(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->fuerza;
    }

    /**
     * Método que devuelve el valor del atributo $destreza.
     *
     * @access public
     * @return int Destreza del personaje.
     */
    public function getDestreza(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->destreza;
    }

    /**
     * Método que devuelve el valor del atributo $carisma.
     *
     * @access public
     * @return int Carisma del personaje.
     */
    public function getCarisma(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->carisma;
    }

    /** FUNCIONES * */
    /**
     * Método que comprueba si existen partidas.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function existePartida(int $id): bool
    {
        /** @var BDPersonaje Instancia un objeto de la clase. */
        $bdpersonaje = new BDPersonaje();
        /** Inicializa los atributos del objeto. */
        $bdpersonaje->setIdPartidas($id);

        /** Comprueba si existe el usuario. */
        if ($bdpersonaje->existePartida($id)) {
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
    public function almacenaPartida(): bool
    {
        /** @var BDPersonaje Instancia un objeto de la clase. */
        $bdpersonaje = new BDPersonaje();
        /** Inicializa los atributos del objeto. */
        $bdpersonaje->setIdPartidas($this->idPartidas);
        $bdpersonaje->setAlias($this->alias);
        $bdpersonaje->setNivel($this->nivel);
        $bdpersonaje->setExp($this->exp);
        $bdpersonaje->setMonedas($this->monedas);
        $bdpersonaje->setFuerza($this->fuerza);
        $bdpersonaje->setDestreza($this->destreza);
        $bdpersonaje->setCarisma($this->carisma);

        /** Inserta un nuevo usuario y comprueba un posible error. */
        if ($bdpersonaje->altaPartida()) {
            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que busca la partida del usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function buscarPartida(int $id): bool
    {
        /** @var BDPersonaje Instancia un objeto de la clase. */
        $bdpersonaje = new BDPersonaje();
        /** Inicializa los atributos del objeto. */
        $bdpersonaje->setIdPartidas($id);

        /** Comprueba si existe y gestiona un posible error. */
        if ($bdpersonaje->buscarPartida()) {
            /** Inicializa los atributos del objeto con los datos almacenados. */
            $this->idPartidas = $bdpersonaje->getIdPartidas();
            $this->alias = $bdpersonaje->getAlias();
            $this->nivel = $bdpersonaje->getNivel();
            $this->exp = $bdpersonaje->getExp();
            $this->monedas = $bdpersonaje->getMonedas();
            $this->fuerza = $bdpersonaje->getMonedas();
            $this->destreza = $bdpersonaje->getMonedas();
            $this->carisma = $bdpersonaje->getMonedas();

            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que elimina la partida de un usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function eliminaPartida(int $id): bool
    {
        /** @var BDPersonaje Instancia un objeto de la clase. */
        $bdpersonaje = new BDPersonaje();
        /** Inicializa los atributos del objeto. */
        $bdpersonaje->setIdPartidas($id);
        /** Elimina un usuario y comprueba un posible error. */
        if ($bdpersonaje->eliminaPartida($id)) {
            /** Devuelve true si se ha conseguido. */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }

    /**
     * Método que guarda la partida de un usuario.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function guardarPartida()
    {
        /** @var BDPersonaje Instancia un objeto de la clase. */
        $bdpersonaje = new BDPersonaje();
        /** Inicializa los atributos del objeto. */
        $bdpersonaje->setIdPartidas($this->idPartidas);
        /** Añade los nuevos datos de partida y comprueba un posible error. */
        /** Estos valores se añaden de prueba para comprobar el 
         * funcionamiento del guardado de partida hasta que se 
         * solucionen los errores de lado del cliente */
        if ($bdpersonaje->guardarPartida(
            $this->idPartidas,
            $this->alias,
            $this->nivel,
            $this->exp,
            $this->monedas,
            $this->fuerza,
            $this->destreza,
            $this->carisma
        )) {
            /** Si la partida se guarda correctamente */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }
}
