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
class BDPersonaje extends BDConexion
{
    /**
     * @var int ID partidas del usuario.
     * @access private 
     */
    private ?int $idPartidas = null;

    /**
     * @var int Nombre del personaje.
     * @access private
     */
    private String $alias;

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
     * @var int Fuerza del personaje.
     * @access private
     */
    private int $fuerza;

    /**
     * @var int Destreza del personaje.
     * @access private
     */
    private int $destreza;

    /**
     * @var int Carisma del personaje.
     * @access private
     */
    private int $carisma;

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
     * Método que inicializa el atributo $alias.
     * @access public
     * @param String $alias Alias del personaje.
     * @return void
     */
    public function setAlias(String $alias): void
    {
        /** Inicializa la propiedad. */
        $this->alias = $alias;
    }

    /**
     * Método que inicializa el atributo $nivel.
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
     * @access public
     * @param int $carisma Carisma del personaje.
     * @return void
     */
    public function setCarisma(int $carisma): void
    {
        /** Inicializa la propiedad. */
        $this->carisma = $carisma;
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
     * Método que devuelve el valor del atributo $alias.
     * @access public
     * @return String Nombre del personaje.
     */
    public function getAlias(): String
    {
        /** Devuelve el valor de la propiedad. */
        return $this->alias;
    }

    /**
     * Método que devuelve el valor del atributo $nivel.
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
     * @access public
     * @return int Carisma del personaje.
     */
    public function getCarisma(): int
    {
        /** Devuelve el valor de la propiedad. */
        return $this->carisma;
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
			FROM Personaje
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
				FROM Personaje
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
                $this->alias = $fila['alias'];
                $this->nivel = $fila['nivel'];
                $this->exp = $fila['exp'];
                $this->monedas = $fila['monedas'];
                $this->fuerza = $fila['fuerza'];
                $this->destreza = $fila['destreza'];
                $this->carisma = $fila['carisma'];

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
                "INSERT INTO Personaje (idPartidas, alias, nivel, exp, monedas, fuerza, destreza, carisma)
					VALUES (:idPartidas, :alias, :nivel, :exp, :monedas, :fuerza, :destreza, :carisma)"
            );
            /** Vincula los parámetros al nombre de variable especificado. */
            $resultado->bindParam(':idPartidas', $this->idPartidas);
            $resultado->bindParam(':alias', $this->alias);
            $resultado->bindParam(':nivel', $this->nivel);
            $resultado->bindParam(':exp', $this->exp);
            $resultado->bindParam(':monedas', $this->monedas);
            $resultado->bindParam(':fuerza', $this->fuerza);
            $resultado->bindParam(':destreza', $this->destreza);
            $resultado->bindParam(':carisma', $this->carisma);

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
                "DELETE FROM Personaje
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
        string $alias,
        int $nivel,
        int $exp,
        int $monedas,
        int $fuerza,
        int $destreza,
        int $carisma
    ): bool {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getPdocon()) {
            /** Prepara la sentencia SQL. */
            $resultado = $this->getPdocon()->prepare(
                "UPDATE Personaje
                SET alias='$alias', nivel='$nivel', exp='$exp', monedas='$monedas', 
                 fuerza='$fuerza', destreza='$destreza', carisma='$carisma'
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
