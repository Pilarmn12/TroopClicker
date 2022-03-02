<?php

/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
include '../capaDatos/bdpartidas.php';

/**
 * Declaración de la clase Partida
 */
class Partida
{
    /** ATRIBUTOS * */

    /**
     * @var int Id partidas del usuario.
     * @access private
     */
    private int $idPartidas;

    /**
     * @var string Fecha de creacion de la partida.
     * @access private
     */
    private string $fechaCreacion;

    /**
     * @var int Monedas del usuario.
     * @access private
     */
    private int $monedas;

    /**
     * @var int Mejoras de daño del usuario.
     * @access private
     */
    private int $cantDanio;

    /**
     * @var int Cantidad de trampas del usuario.
     * @access private
     */
    private int $cantTrampas;

    /**
     * @var int Cantidad de campesinos del usuario.
     * @access private
     */
    private int $cantCampesinos;

    /**
     * @var int Cantidad de garroteros del usuario.
     * @access private
     */
    private int $cantGarroteros;

    /**
     * @var int Cantidad de soldados con espada corta del usuario.
     * @access private
     */
    private int $cantEspadasCortas;

    /**
     * @var int Cantidad de escuderos del usuario.
     * @access private
     */
    private int $cantEscuderos;

    /**
     * @var int Cantidad de lanceros del usuario.
     * @access private
     */
    private int $cantLanceros;

    /**
     * @var int Cantidad de soldados con hacha del usuario.
     * @access private
     */
    private int $cantHachas;

    /**
     * @var int Cantidad de caballeros del usuario.
     * @access private
     */
    private int $cantCaballeros;

    /**
     * @var int Cantidad de honderos del usuario.
     * @access private
     */
    private int $cantHonderos;

    /**
     * @var int Cantidad de arqueros del usuario.
     * @access private
     */
    private int $cantArqueros;

    /**
     * @var int Cantidad de ballesteros del usuario.
     * @access private
     */
    private int $cantBallesteros;

    /**
     * @var int Cantidad de sacerdotes del usuario.
     * @access private
     */
    private int $cantSacerdotes;

    /**
     * @var int Cantidad de magos del usuario.
     * @access private
     */
    private int $cantMagos;

    /**
     * @var int Cantidad de catapultas del usuario.
     * @access private
     */
    private int $cantCatapultas;


    /** SETTERS * */

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
     * Método que inicializa el atributo $fechaCreacion.
     *
     * @access public
     * @param string $fechaCreacion Fecha de creacion de la partida.
     * @return void
     */
    public function setFecha(string $fechaCreacion): void
    {
        /** Inicializa la propiedad. */
        $this->fechaCreacion = $fechaCreacion;
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
     * Método que inicializa el atributo $cantDanio.
     *
     * @access public
     * @param int $cantDanio Mejoras de daño del usuario.
     * @return void
     */
    public function setDaño(int $cantDanio): void
    {
        /** Inicializa la propiedad. */
        $this->cantDanio = $cantDanio;
    }

    /**
     * Método que inicializa el atributo $cantTrampas.
     *
     * @access public
     * @param int $cantTrampas Mejoras de daño del usuario.
     * @return void
     */
    public function setTrampas(int $cantTrampas): void
    {
        /** Inicializa la propiedad. */
        $this->cantTrampas = $cantTrampas;
    }

    /**
     * Método que inicializa el atributo $cantCampesinos.
     *
     * @access public
     * @param int $cantCampesinos Cantidad de campesinos del usuario.
     * @return void
     */
    public function setCampesinos(int $cantCampesinos): void
    {
        /** Inicializa la propiedad. */
        $this->cantCampesinos = $cantCampesinos;
    }

    /**
     * Método que inicializa el atributo $cantGarroteros.
     *
     * @access public
     * @param int $cantGarroteros Cantidad de garroteros del usuario.
     * @return void
     */
    public function setGarroteros(int $cantGarroteros): void
    {
        /** Inicializa la propiedad. */
        $this->cantGarroteros = $cantGarroteros;
    }

    /**
     * Método que inicializa el atributo $cantEspadasCortas.
     *
     * @access public
     * @param int $cantEspadasCortas Cantidad de soldados con espada corta del usuario.
     * @return void
     */
    public function setEspadasCortas(int $cantEspadasCortas): void
    {
        /** Inicializa la propiedad. */
        $this->cantEspadasCortas = $cantEspadasCortas;
    }

    /**
     * Método que inicializa el atributo $cantEscuderos.
     *
     * @access public
     * @param int $cantEscuderos Cantidad de escuderos del usuario.
     * @return void
     */
    public function setEscuderos(int $cantEscuderos): void
    {
        /** Inicializa la propiedad. */
        $this->cantEscuderos = $cantEscuderos;
    }

    /**
     * Método que inicializa el atributo $cantLanceros.
     *
     * @access public
     * @param int $cantLanceros Cantidad de lanceros del usuario.
     * @return void
     */
    public function setLanceros(int $cantLanceros): void
    {
        /** Inicializa la propiedad. */
        $this->cantLanceros = $cantLanceros;
    }

    /**
     * Método que inicializa el atributo $cantHachas.
     *
     * @access public
     * @param int $cantHachas Cantidad de hachas del usuario.
     * @return void
     */
    public function setHachas(int $cantHachas): void
    {
        /** Inicializa la propiedad. */
        $this->cantHachas = $cantHachas;
    }

    /**
     * Método que inicializa el atributo $cantCaballeros.
     *
     * @access public
     * @param int $cantCaballeros Cantidad de caballeros del usuario.
     * @return void
     */
    public function setCaballeros(int $cantCaballeros): void
    {
        /** Inicializa la propiedad. */
        $this->cantCaballeros = $cantCaballeros;
    }

    /**
     * Método que inicializa el atributo $cantHonderos.
     *
     * @access public
     * @param int $cantHonderos Cantidad de honderos del usuario.
     * @return void
     */
    public function setHonderos(int $cantHonderos): void
    {
        /** Inicializa la propiedad. */
        $this->cantHonderos = $cantHonderos;
    }

    /**
     * Método que inicializa el atributo $cantArqueros.
     *
     * @access public
     * @param int $cantArqueros Cantidad de arqueros del usuario.
     * @return void
     */
    public function setArqueros(int $cantArqueros): void
    {
        /** Inicializa la propiedad. */
        $this->cantArqueros = $cantArqueros;
    }

    /**
     * Método que inicializa el atributo $cantBallesteros.
     *
     * @access public
     * @param int $cantBallesteros Cantidad de ballesteros del usuario.
     * @return void
     */
    public function setBallesteros(int $cantBallesteros): void
    {
        /** Inicializa la propiedad. */
        $this->cantBallesteros = $cantBallesteros;
    }

    /**
     * Método que inicializa el atributo $cantSacerdotes.
     *
     * @access public
     * @param int $cantSacerdotes Cantidad de sacerdotes del usuario.
     * @return void
     */
    public function setSacerdotes(int $cantSacerdotes): void
    {
        /** Inicializa la propiedad. */
        $this->cantSacerdotes = $cantSacerdotes;
    }

    /**
     * Método que inicializa el atributo $cantMagos.
     *
     * @access public
     * @param int $cantMagos Cantidad de magos del usuario.
     * @return void
     */
    public function setMagos(int $cantMagos): void
    {
        /** Inicializa la propiedad. */
        $this->cantMagos = $cantMagos;
    }

    /**
     * Método que inicializa el atributo $cantCatapultas.
     *
     * @access public
     * @param int $cantCatapultas Cantidad de catapultas del usuario.
     * @return void
     */
    public function setCatapultas(int $cantCatapultas): void
    {
        /** Inicializa la propiedad. */
        $this->cantCatapultas = $cantCatapultas;
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
     * Método que devuelve el valor del atributo $fechaCreacion.
     *
     * @access public
     * @return string Fecha de creacion de la partida.
     */
    public function getFecha(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->fechaCreacion;
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
     * Método que devuelve el valor del atributo $cantDanio.
     *
     * @access public
     * @return int Mejoras daño del usuario del usuario.
     */
    public function getDaño(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantDanio;
    }

    /**
     * Método que devuelve el valor del atributo $cantTrampas.
     *
     * @access public
     * @return int Cantidad de trampas del usuario.
     */
    public function getTrampas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantTrampas;
    }

    /**
     * Método que devuelve el valor del atributo $cantCampesinos.
     *
     * @access public
     * @return int Cantidad de campesinos del usuario.
     */
    public function getCampesinos(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantCampesinos;
    }

    /**
     * Método que devuelve el valor del atributo $cantGarroteros.
     *
     * @access public
     * @return int Cantidad de garroteros del usuario.
     */
    public function getGarroteros(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantGarroteros;
    }

    /**
     * Método que devuelve el valor del atributo $cantEspadasCortas.
     *
     * @access public
     * @return int Cantidad de soldados con espada corta del usuario.
     */
    public function getEspadasCortas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantEspadasCortas;
    }

    /**
     * Método que devuelve el valor del atributo $cantEscuderos.
     *
     * @access public
     * @return int Cantidad de escuderos del usuario.
     */
    public function getEscuderos(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantEscuderos;
    }

    /**
     * Método que devuelve el valor del atributo $cantLanceros.
     *
     * @access public
     * @return int Cantidad de lanceros del usuario.
     */
    public function getLanceros(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantLanceros;
    }

    /**
     * Método que devuelve el valor del atributo $cantHachas.
     *
     * @access public
     * @return int Cantidad de soldados con hacha del usuario.
     */
    public function getHachas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantHachas;
    }

    /**
     * Método que devuelve el valor del atributo $cantCaballeros.
     *
     * @access public
     * @return int Cantidad de caballeros del usuario.
     */
    public function getCaballeros(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantCaballeros;
    }

    /**
     * Método que devuelve el valor del atributo $cantHonderos.
     *
     * @access public
     * @return int Cantidad de honderos del usuario.
     */
    public function getHonderos(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantHonderos;
    }

    /**
     * Método que devuelve el valor del atributo $cantArqueros.
     *
     * @access public
     * @return int Cantidad de arqueros del usuario.
     */
    public function getArqueros(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantArqueros;
    }

    /**
     * Método que devuelve el valor del atributo $cantBallesteros.
     *
     * @access public
     * @return int Cantidad de ballesteros del usuario.
     */
    public function getBallesteros(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantBallesteros;
    }

    /**
     * Método que devuelve el valor del atributo $cantSacerdotes.
     *
     * @access public
     * @return int Cantidad de sacerdotes del usuario.
     */
    public function getSacerdotes(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantSacerdotes;
    }

    /**
     * Método que devuelve el valor del atributo $cantMagos.
     *
     * @access public
     * @return int Cantidad de magos del usuario.
     */
    public function getMagos(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantMagos;
    }

    /**
     * Método que devuelve el valor del atributo $cantCatapultas.
     *
     * @access public
     * @return int Cantidad de catapultas del usuario.
     */
    public function getCatapultas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantCatapultas;
    }

    /** FUNCIONES **/

    /**
     * Método que comprueba si existen partidas.
     *
     * @access public
     * @return boolean	True en caso afirmativo
     * 					False en caso contrario.
     */
    public function existePartida(int $id): bool
    {
        /** @var BDPartidas Instancia un objeto de la clase. */
        $bdpartida = new BDPartidas();
        /** Inicializa los atributos del objeto. */
        $bdpartida->setIdPartidas($id);

        /** Comprueba si existe el usuario. */
        if ($bdpartida->existePartida($id)) {
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
        /** @var BDPartidas Instancia un objeto de la clase. */
        $bdpartida = new BDPartidas();
        /** Inicializa los atributos del objeto. */
        $bdpartida->setIdPartidas($this->idPartidas);
        $bdpartida->setMonedas($this->monedas);
        $bdpartida->setDaño($this->cantDanio);
        $bdpartida->setTrampas($this->cantTrampas);
        $bdpartida->setCampesinos($this->cantCampesinos);
        $bdpartida->setGarroteros($this->cantGarroteros);
        $bdpartida->setEspadasCortas($this->cantEspadasCortas);
        $bdpartida->setEscuderos($this->cantEscuderos);
        $bdpartida->setLanceros($this->cantLanceros);
        $bdpartida->setHachas($this->cantHachas);
        $bdpartida->setCaballeros($this->cantCaballeros);
        $bdpartida->setHonderos($this->cantHonderos);
        $bdpartida->setArqueros($this->cantArqueros);
        $bdpartida->setBallesteros($this->cantBallesteros);
        $bdpartida->setSacerdotes($this->cantSacerdotes);
        $bdpartida->setMagos($this->cantMagos);
        $bdpartida->setCatapultas($this->cantCatapultas);

        /** Inserta un nuevo usuario y comprueba un posible error. */
        if ($bdpartida->altaPartida()) {
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
        /** @var BDPartidas Instancia un objeto de la clase. */
        $bdpartida = new BDPartidas();
        /** Inicializa los atributos del objeto. */
        $bdpartida->setIdPartidas($id);

        /** Comprueba si existe y gestiona un posible error. */
        if ($bdpartida->buscarPartida()) {
            /** Inicializa los atributos del objeto con los datos almacenados. */
            $this->idPartidas = $bdpartida->getIdPartidas();
            $this->monedas = $bdpartida->getMonedas();
            $this->cantDanio = $bdpartida->getDaño();
            $this->cantTrampas = $bdpartida->getTrampas();
            $this->cantCampesinos = $bdpartida->getCampesinos();
            $this->cantGarroteros = $bdpartida->getGarroteros();
            $this->cantEspadasCortas = $bdpartida->getEspadasCortas();
            $this->cantEscuderos = $bdpartida->getEscuderos();
            $this->cantLanceros = $bdpartida->getLanceros();
            $this->cantHachas = $bdpartida->getHachas();
            $this->cantCaballeros = $bdpartida->getCaballeros();
            $this->cantHonderos = $bdpartida->getHonderos();
            $this->cantArqueros = $bdpartida->getArqueros();
            $this->cantBallesteros = $bdpartida->getBallesteros();
            $this->cantSacerdotes = $bdpartida->getSacerdotes();
            $this->cantMagos = $bdpartida->getMagos();
            $this->cantCatapultas = $bdpartida->getCatapultas();

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
        /** @var BDPartidas Instancia un objeto de la clase. */
        $bdpartida = new BDPartidas();
        /** Inicializa los atributos del objeto. */
        $bdpartida->setIdPartidas($id);
        /** Elimina un usuario y comprueba un posible error. */
        if ($bdpartida->eliminaPartida($id)) {
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
    public function guardarPartida(int $id)
    {
        /** @var BDPartidas Instancia un objeto de la clase. */
        $bdpartida = new BDPartidas();
        /** Inicializa los atributos del objeto. */
        $bdpartida->setIdPartidas($id);
        /** Añade los nuevos datos de partida y comprueba un posible error. */

        /** Estos valores se añaden de prueba para comprobar el 
         * funcionamiento del guardado de partida hasta que se 
         * solucionen los errores de lado del cliente */
        if ($bdpartida->guardarPartida(
            $id,
            585458,
            6,
            15,
            11,
            6,
            $this->cantEspadasCortas,
            $this->cantEscuderos,
            $this->cantLanceros,
            $this->cantHachas,
            $this->cantCaballeros,
            $this->cantHonderos,
            $this->cantArqueros,
            $this->cantBallesteros,
            $this->cantSacerdotes,
            $this->cantMagos,
            $this->cantCatapultas
        )) {
            /** Si la partida se guarda correctamente */
            return true;
        }
        /** Devuelve false si se ha producido un error. */
        return false;
    }
}
