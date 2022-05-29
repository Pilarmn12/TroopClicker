<?php

/**
 * formulario.php
 * Módulo secundario que implementa la clase solicitudTrabajo.
 */

class solicitudTrabajo
{
    /**
     * @var string Nombre Completo del usuario.
     * @access private
     */
    private string $nombreCompleto;
    /**
     * @var string Fecha nacimiento.
     * @access private
     */
    private string $fecha;
    /**
     * @var string Edad del usuario.
     * @access private
     */
    private string $edad;
    /**
     * @var string Localidad del usuario.
     * @access private
     */
    private string $localidad;
    /**
     * @var string Telefono del usuario.
     * @access private
     */
    private string $telefono;
    /**
     * @var string Dirección de correo electrónico del usuario.
     * @access private
     */
    private string $email;
    /**
     * @var string Formacion academica del usuario.
     * @access private
     */
    private string $estudios;
    /**
     * @var string Experiencia laboral del usuario.
     * @access private
     */
    private string $experiencia;
    /**
     * @var string Datos relevantes del usuario.
     * @access private
     */
    private string $datosInteres;

    /**
     * Método que inicializa el atributo $nombre.
     *
     * @access public
     * @param string $nombre Nombre del usuario.
     * @return array[]:string Array de errores.
     */
    public function setNombreCompleto(string $nombreCompleto): array
    {
        /** Inicializa la propiedad. */
        /** @var array[]:string  Array vacío, supone que no hay errores. */
        $error = array();
        //if (!preg_match('`^[A-Z]{1}[a-z]*\s[A-Z]{1}[A-Za-z]*$`', $nombreCompleto)) {

        if (!preg_match('`^[A-Z]{1}[a-z]*\s+[A-Za-z]*`', $nombreCompleto)) {
            /** Inicializa el valor de la propiedad. */
            $error[] = 'El nombre debe empezar con letra mayuscula';
        }
        if (!preg_match('`[a-z]*\s{1}[A-Z]{1}[a-z]*$`', $nombreCompleto)) {
            /** Inicializa el valor de la propiedad. */
            $error[] = 'El apellido debe empezar con letra mayuscula';
        }
        /** Comprueba si no hay errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->nombreCompleto = $nombreCompleto;
        }
        /** Devuelve el indicador de error. */
        return ($error);
    }

    /**
     * Método que inicializa la propiedad fecha.
     *
     * @access public
     * @param string $fecha Fecha actual.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setFecha(string $fecha): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        /** Comprueba el formato de la fecha dd/mm/aaaa. */
        if (strlen($fecha) == 10 && $fecha[2] == '/' && $fecha[5] == '/') {
            /** Extrae el día, mes y año de la fecha. */
            $elementosFecha = explode("/", $fecha);
            /** Comprueba que todos los elementos de la fecha sean numéricos. */
            if (
                ctype_digit($elementosFecha[0]) &&
                ctype_digit($elementosFecha[1]) &&
                ctype_digit($elementosFecha[2])
            ) {
                $ano_diferencia  = date("Y") - $elementosFecha[2];
                $mes_diferencia = date("m") - $elementosFecha[1];
                $dia_diferencia   = date("d") - $elementosFecha[0];

                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                    $ano_diferencia--;
                if ($ano_diferencia < 18) {
                    $error[] = 'Debes de ser mayor de 18 años para solicitar el trabajo';
                }

            } else {
                /** Añade el texto del error al array de errores. */
                $error[] = 'La fecha debe estar formada por valores numéricos';
            }
        } else {
            /** Añade el texto del error al array de errores. */
            $error[] = 'La fecha debe tener un formato correcto dd/mm/aaaa';
        }
        /** Comprueba que no existen errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->fecha = $fecha;
        }
        /** Devuelve el array con los errores. */
        return $error;
    }
    /**
     * Método que inicializa la propiedad edad.
     *
     * @access public
     * @param string $edad Edad del usuario.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setEdad(string $edad): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        /** Comprueba que la edad sea un numero entero. */
        if (!ctype_digit($edad)) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'La edad debe de ser un numero';
        }
        /** Comprueba que las letras sean todas mayusculas. */
        if ($edad <= 17) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'Debes de ser mayor de 18 años para presentarte.';
        }
        /** Comprueba que no existan errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->edad = $edad;
        }
        /** Devuelve el array con los errores. */
        return ($error);
    }
    /**
     * Método que inicializa la propiedad telefono.
     *
     * @access public
     * @param string $nombre Telefono del usuario.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setTelefono(string $telefono): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        /** Comprueba la longitud del localidad. */
        if (!strlen($telefono) == 9) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'El telefono tiene que tener 9 numeros';
        }
        /** Comprueba que el primer carácter sea una letra. */
        if (!filter_var($telefono,  FILTER_VALIDATE_INT)) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'El telefono debe tener un formato válido';
        }
        /** Comprueba que no existan errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->telefono = $telefono;
        }
        /** Devuelve el array con los errores. */
        return ($error);
    }

    /**
     * Método que inicializa la propiedad Localidad.
     *
     * @access public
     * @param string $nombre Localidad del usuario.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setLocalidad(string $localidad): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        /** Comprueba la longitud del localidad. */
        if (strlen($localidad) < 5 || strlen($localidad) > 30) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'La localidad debe tener entre 5 y 30 caracteres';
        }
        /** Comprueba que el primer carácter sea una letra. */
        if (!ctype_alpha($localidad)) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'La localidad debe contener solo letras';
        }
        /** Comprueba que las letras sean todas mayusculas. */
        if (!ctype_upper($localidad)) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'La localidad debe estar en Mayusculas y en una sola palabra';
        }

        /** Comprueba que no existan errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->localidad = $localidad;
        }
        /** Devuelve el array con los errores. */
        return ($error);
    }

    /**
     * Método que inicializa la propiedad email.
     *
     * @access public
     * @param string $email Email del usuario.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setEmail(string $email): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        /** Valida la dirección de correo. */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            /** Añade el texto del error al array de errores. */
            $error[] = 'El email debe tener un formato válido';
        }
        /** Comprueba que no existan errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->email = $email;
        }
        /** Devuelve el array con los errores. */
        return $error;
    }

    /**
     * Método que inicializa la propiedad estudios .
     *
     * @access public
     * @param string $nombre Estudios del usuario.
     * @return array[]:string Array con el texto de los errores.
     */
    public function setEstudios(string $estudios): array
    {
        /** @var array[]:string  Supone que en principio no hay error. */
        $error = array();
        if (!preg_match('`^[1-2]ºDAW|^[1-2]ºDAM|^[1-2]ºSMR`', $estudios)) {
            /** Inicializa el valor de la propiedad. */
            $error[] = 'El grado introduccido debe ser uno de los siguientes: 1/2ºDAW, 1/2ºDAM, 1/2ºSMR';
        }
        /** Comprueba que no existan errores. */
        if (!$error) {
            /** Inicializa el valor de la propiedad. */
            $this->estudios = $estudios;
        }
        /** Devuelve el array con los errores. */
        return ($error);
    }

    /**
     * Método que inicializa la propiedad experiencia.
     *
     * @access public
     * @param string $experiencia Experiencia de acceso del usuario.
     * @return void
     */
    public function setExperiencia(string $experiencia): void
    {
        /** Inicializa el valor de la propiedad. */
        $this->experiencia = $experiencia;
    }
    /**
     * Método que inicializa la propiedad Datos de Interes.
     *
     * @access public
     * @param string $datosInteres Datos de Interes del usuario.
     * @return void
     */
    public function setDatosInteres(string $datosInteres): void
    {
        $datosInteresSaneado = strip_tags($datosInteres);
        /** Inicializa el valor de la propiedad. */
        $this->datosInteres = $datosInteresSaneado;
    }

    /**
     * Metodo que devuelve el valor del atributo $nombreCompleto.
     *
     * @access public
     * @return string Nombre Completo del usuario.
     */
    public function getNombreCompleto(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->nombreCompleto;
    }

    /**
     * Metodo que devuelve el valor del atributo $edad.
     *
     * @access public
     * @return string Edad del usuario.
     */
    public function getEdad(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->edad;
    }

    /**
     * Metodo que devuelve el valor del atributo $telefono.
     *
     * @access public
     * @return string Telefono del usuario.
     */
    public function getTelefono(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->telefono;
    }

    /**
     * Metodo que devuelve el valor del atributo $localidad.
     *
     * @access public
     * @return string Localidad del usuario.
     */
    public function getLocalidad(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->localidad;
    }

    /**
     * Metodo que devuelve el valor del atributo $email.
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
     * Metodo que devuelve el valor del atributo $estudios.
     *
     * @access public
     * @return string Estudios del usuario.
     */
    public function getEstudios(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->estudios;
    }

    /**
     * Metodo que devuelve el valor del atributo $experiencia.
     *
     * @access public
     * @return string Experiencia del usuario.
     */
    public function getExperiencia(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->experiencia;
    }

    /**
     * Metodo que devuelve el valor del atributo $datosInteres.
     *
     * @access public
     * @return string Datos de Interes del usuario.
     */
    public function getDatosInteres(): string
    {
        /** Devuelve el valor de la propiedad. */
        return $this->datosInteres;
    }
}
