<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** Si ha llegado al navegador el parametro politica-cookies se crea la cookie politica */
if (isset($_REQUEST['politica-cookies'])) {
    /** Creamos la duracion de la cookie, sera de un año */
    $caducidad = time() + (60 * 60 * 24 * 365);
    /** Cremos la cookie asignandole la caducidad */
    setcookie('politica', '1', $caducidad);
}
?>
<!--
        * validaPartida.php
        * Módulo secundario que comprueba las partidas y permite gestionarlas
        * al usuario.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Partidas - TC</title>
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
</head>

<body>
    <?php
    /** Incluimos el archivo PHP que contiene la barra de navegacion */
    include './inc/navbar.php';
    ?>
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <h2 class="text-center text-decoration-underline fw-bold">
                        Gestiona tu partida</h2>
                </div>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 mb-lg-0">
                    <?php
                    /** Incluimos el archivo PHP que contiene la barra de navegacion */
                    if ((!isset($_SESSION['tropas'])) and (!isset($_SESSION['personaje']))) {
                        /** @var Tropas Instancia un objeto de la clase. */
                        $tropas = new Tropas();

                        /** @var Personaje Instancia un objeto de la clase. */
                        $personaje = new Personaje();
                        /** Inicializa los atributos del objeto. */

                        $id = $_SESSION['usuario']->getIdPartidas();

                        $tropas->setIdPartidas($id);
                        $personaje->setIdPartidas($id);

                        /** Si no encuentra la tabla tropas y personaje */
                        if ((!$tropas->buscarPartida($id)) and (!$personaje->buscarPartida($id))) {
                            /** Si no encuentra tropas, inicia los atributos a 0 */
                            $tropas->setDaño("0");
                            $tropas->setTrampas("0");
                            $tropas->setCampesinos("0");
                            $tropas->setGarroteros("0");
                            $tropas->setEspadasCortas("0");
                            $tropas->setEscuderos("0");
                            $tropas->setLanceros("0");
                            $tropas->setHachas("0");
                            $tropas->setCaballeros("0");
                            $tropas->setHonderos("0");
                            $tropas->setArqueros("0");
                            $tropas->setBallesteros("0");
                            $tropas->setSacerdotes("0");
                            $tropas->setMagos("0");
                            $tropas->setCatapultas("0");

                            /** Si no encuentra personaje, inicia los atributos a 0 */
                            $primeraParte = substr((strtolower($_SESSION['usuario']->getNombre())), 0, 4);
                            $nrRand = rand(100, 9999);
                        
                            $user = $primeraParte.$nrRand;
                            $personaje->setAlias($user);
                            $personaje->setNivel("1");
                            $personaje->setExp("0");
                            $personaje->setMonedas("0");
                            $personaje->setFuerza("0");
                            $personaje->setDestreza("0");
                            $personaje->setCarisma("0");

                            /** Intenta almacenar al usuario y comprueba error. */
                            if (($tropas->almacenaPartida()) and ($personaje->almacenaPartida())) {
                                /** El usuario se ha registrado correctamente. */
                                echo '<h4 class="text-center">El usuario ha sido'
                                    . ' almacenado con éxito</h4>';
                                /** Crea la sesion partida con los datos que devuelve */
                                $_SESSION['tropas'] = $tropas;
                                $_SESSION['personaje'] = $personaje;
                    ?>
                                <div class="row justify-content-center">
                                    <div class="col-md-auto col-md-offset-3 mt-5">
                                        <!-- Muestra la posibilidad de ver la información. -->
                                        <p class="centra fs-5">
                                            ¿Deseas ver la información del
                                            usuario?
                                        </p>
                                        <form action="areaUsuario.php" method="post">
                                            <input class="btn btn-success
                                                       btn-lg w-100 mt-3" type="submit" value="Volver al perfil">
                                        </form>
                                    </div>
                                </div>
                    <?php
                            } else {
                                echo '<h4 class="text-center">Error al crear'
                                    . ' la partida, intentelo de nuevo.</h4>';
                                header('refresh:3; url=accesoUsuario.php');
                            }
                        } else {
                            /** Se ha producido un error al registrar el usuario. */
                            echo '<h5 class="text-center">Error en el 
                                        archivo al almacenar el usuario</h5>';
                            header('refresh:3; url=accesoUsuario.php');
                        }
                    } else {
                        /** Se intenta registrar un usuario existente. */
                        echo '<h5 class="text-center">El usuario ya '
                            . 'existe en el archivo</h5>';
                        header('refresh:3; url=accesoUsuario.php');
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        /** Si la cookie politica no esta creada y el navegador no recibio el parametro de politica-cookies, muestra el aviso */
        if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])) : ?>
            <!-- TOAST - MENSAJE -->
            <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 9999">
                <div class="toast" role="alert" data-animation="true" data-autohide="false" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fas fa-user rounded me-2"></i>
                        <strong class="me-auto">Administrador</strong>
                        <small>Hace 4 minutos</small>
                        <button type="button" class="btn-close ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <div class="ml-2 mr-2 mb-3">
                            <span>
                                <img src="https://i.imgur.com/Tl8ZBUe.png" width="40">
                                Éste sitio web usa cookies, si permanece aquí acepta su uso.
                                Puede leer más sobre el uso de cookies en nuestra
                                <a href="politica.html">política de privacidad</a></span>
                        </div>
                        <div>
                            <!-- Si pulsa en aceptar se reinicia la ventana y envia el parametro para crear la coookie politica -->
                            <a href="?politica-cookies=1" class="btn btn-dark" type="button">Aceptar y cerrar este mensaje</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Toast End-->
        <?php endif; ?>
    </section>
    <!-- Footer-->
    <?php
    /** Incluimos el archivo PHP que contiene el Footer */
    include './inc/footerFixed.php';
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>