<?php

/**
 * bdpartidas.php
 * Módulo secundario que implementa la clase BDPartidas.
 */
/** Incluye la clase base. */
include_once 'bdconexion.php';

/**
 * Declaración de la clase BDUsuarios.
 */
class BDTropas extends BDConexion
{
    /**
     * @var int ID partidas del usuario.
     * @access private 
     */
    private ?int $idPartidas = null;

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
     * Método que inicializa el atributo $cantDanio.
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
     * @access public
     * @param int $cantCatapultas Cantidad de catapultas del usuario.
     * @return void
     */
    public function setCatapultas(int $cantCatapultas): void
    {
        /** Inicializa la propiedad. */
        $this->cantCatapultas = $cantCatapultas;
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
     * Método que devuelve el valor del atributo $cantDanio.
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
     * @access public
     * @return int Cantidad de catapultas del usuario.
     */
    public function getCatapultas(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->cantCatapultas;
    }

    /**
     * Método que comprueba si existe la partida en la base de datos.
     * 
     * @access public
     * @return boolean True si existe el email del usuario y False en otro caso
     */
    public function existePartida(int $id): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** @var PDOStatement Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "SELECT *
			FROM Tropas
			WHERE idPartidas = :idPartidas"
            );
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $id);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            if ($resultado->execute()) {
                /** Comprueba que el número de filas sea 1. */
                if ($resultado->rowCount() === 1) {
                    /** Existe el id del usuario. */
                    return true;
                }
            }
        }
        /** No existe la cuenta del usuario. */
        return false;
    }

    /**
     * Método que busca y valida una partida en la base de datos.
     * 
     * @access public
     * @return boolean True si existe y False en otro caso
     */
    public function buscarPartida(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare("
				SELECT *
				FROM Tropas
				WHERE idPartidas = :idPartidas");
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $this->idPartidas);
            /** Ejecuta la sentencia preparada y comprueba un posible error. */
            $resultado->execute();
            /** Comprueba que el número de filas sea 1. */
            if ($resultado->rowCount() === 1) {
                /** Accede a los valores obtenidos. */
                $fila = $resultado->fetch();
                /** Inicializa los atributos del objeto. */
                $this->idPartidas = $fila['idPartidas'];
                $this->cantDanio = $fila['cantDanio'];
                $this->cantTrampas = $fila['cantTrampas'];
                $this->cantCampesinos = $fila['cantCampesinos'];
                $this->cantGarroteros = $fila['cantGarroteros'];
                $this->cantEspadasCortas = $fila['cantEspadasCortas'];
                $this->cantEscuderos = $fila['cantEscuderos'];
                $this->cantLanceros = $fila['cantLanceros'];
                $this->cantHachas = $fila['cantHachas'];
                $this->cantCaballeros = $fila['cantCaballeros'];
                $this->cantHonderos = $fila['cantHonderos'];
                $this->cantArqueros = $fila['cantArqueros'];
                $this->cantBallesteros = $fila['cantBallesteros'];
                $this->cantSacerdotes = $fila['cantSacerdotes'];
                $this->cantMagos = $fila['cantMagos'];
                $this->cantCatapultas = $fila['cantCatapultas'];

                /** Existe el usuario. */
                return (true);
            }
        }
        /** No existe el usuario. */
        return (false);
    }

    /**
     * Método que inserta una nueva partida en la base de datos
     * 
     * @access public
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function altaPartida(): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "INSERT INTO Tropas (idPartidas, cantDanio, cantTrampas,
                 cantCampesinos, cantGarroteros, cantEspadasCortas, cantEscuderos, cantLanceros,
                  cantHachas, cantCaballeros, cantHonderos, cantArqueros, cantBallesteros,
                   cantSacerdotes, cantMagos, cantCatapultas)
					VALUES (:idPartidas, :cantDanio, :cantTrampas, :cantCampesinos,
                     :cantGarroteros, :cantEspadasCortas, :cantEscuderos, :cantLanceros, :cantHachas,
                      :cantCaballeros, :cantHonderos, :cantArqueros, :cantBallesteros, :cantSacerdotes, :cantMagos, :cantCatapultas)"
            );
            /** Vincula los parámetros al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $this->idPartidas);
            $resultado->bindParam(':cantDanio', $this->cantDanio);
            $resultado->bindParam(':cantTrampas', $this->cantTrampas);
            $resultado->bindParam(':cantCampesinos', $this->cantCampesinos);
            $resultado->bindParam(':cantGarroteros', $this->cantGarroteros);
            $resultado->bindParam(':cantEspadasCortas', $this->cantEspadasCortas);
            $resultado->bindParam(':cantEscuderos', $this->cantEscuderos);
            $resultado->bindParam(':cantLanceros', $this->cantLanceros);
            $resultado->bindParam(':cantHachas', $this->cantHachas);
            $resultado->bindParam(':cantCaballeros', $this->cantCaballeros);
            $resultado->bindParam(':cantHonderos', $this->cantHonderos);
            $resultado->bindParam(':cantArqueros', $this->cantArqueros);
            $resultado->bindParam(':cantBallesteros', $this->cantBallesteros);
            $resultado->bindParam(':cantSacerdotes', $this->cantSacerdotes);
            $resultado->bindParam(':cantMagos', $this->cantMagos);
            $resultado->bindParam(':cantCatapultas', $this->cantCatapultas);

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
     * Método que elimina la partida de un usuario de la base de datos.
     * 
     * @access public
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function eliminaPartida(int $id): bool
    {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "DELETE FROM Tropas
					 WHERE idPartidas = :idPartidas"
            );
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $id);
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
     * Método que permite guardar la partida al usuario. Actualiza con los nuevos datos
     * 
     * @access public
     * @return boolean True si tiene éxito y False en otro caso
     */
    public function guardarPartida(
        int $id,
        int $daño,
        int $trampas,
        int $campesinos,
        int $garroteros,
        int $espadasCortas,
        int $escuderos,
        int $lanceros,
        int $hachas,
        int $caballeros,
        int $honderos,
        int $arqueros,
        int $ballesteros,
        int $sacerdotes,
        int $magos,
        int $catapultas
    ): bool {

        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "UPDATE Tropas
                SET cantDanio='$daño', cantTrampas='$trampas',
                 cantCampesinos='$campesinos', cantGarroteros='$garroteros',
                 cantEspadasCortas='$espadasCortas', cantEscuderos='$escuderos',
                 cantLanceros='$lanceros', cantHachas='$hachas', cantCaballeros='$caballeros',
                 cantHonderos='$honderos', cantArqueros='$arqueros', cantBallesteros='$ballesteros',
                 cantSacerdotes='$sacerdotes', cantMagos='$magos', cantCatapultas='$catapultas'
				WHERE idPartidas = :idPartidas"
            );
            /** Vincula un parámetro al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $id);

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
