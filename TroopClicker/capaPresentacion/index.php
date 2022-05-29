<?php

/** Incluye la clase Usuario. */
include '../capaNegocio/usuario.php';

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
        * index.php
        * Módulo inicial, da acceso a los modulos de acceso de usuarios y gestion .
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a TC</title>
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
    <link rel="stylesheet" href="./css/avisos.css">
</head>

<body>
    <?php
    /** Incluimos el archivo PHP que contiene la barra de navegacion */
    include './inc/navbar.php';
    ?>
    <!-- Header-->
    <header class="bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder text-white mb-2">Bienvenido a
                            la Web Oficial de <br> Troop Clicker</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-8 mb-lg-0">
                    <h3>¿Qué es este juego?</h3>
                    <hr>
                    <p>Es un videojuego incremental, consiste en que por medio
                        de hacer clics sobre el enemigo iras consiguiendo monedas
                        como recompensa, y con ellas podrás mejorar tu héroe,
                        comprar más tropas o mejoras para ellas.
                        <br><br>
                        A parte de eso también podrás comprar objetos en la
                        tienda para poder usarlos<strong> (Esta funcionalidad
                            será añadida en próximas actualizaciones)</strong>

                    </p>

                    <h3>¿Cuál es el objetivo?</h3>
                    <hr>
                    <p>El objetivo principal es poder conseguir todos los logros,
                        y para ello tendrás que golpear muchas veces al enemigo,
                        pero recuerda si se rompe tu ratón nosotros no tenemos
                        la culpa. <br><br> A parte de los logros también
                        planeamos añadir el <strong>Nivel de Renombre
                        </strong> (Mas adelante explicaremos como funcionara)</p>

                    <p>Tambien puedes entrar a la guia oficial para entender el funcionamiento de todo:</p>
                    <a href="./wikiTC/index.php" target="_blank">
                        <button class="btn btn-success w-100 mb-2">Guia Oficial</button>
                    </a>
                </div>
                <div class="col-lg-4 mb-lg-0">
                    <?php
                    /** Si existe la variable de sesión usuario crea 
                     * un boton al area del usuario*/
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <a href="./areaUsuario.php">
                            <button id="botonRegistro" class="btn btn-outline-success border-3">
                                <h1>¡Haz click para empezar a jugar!</h1>
                            </button>
                        </a>
                    <?php
                        /** Si no existe la variable de sesión usuario crea 
                         * un boton al acceso de usuarios.*/
                    } else {
                    ?>
                        <a href="./accesoUsuario.php">
                            <button id="botonRegistro" class="btn btn-outline-success border-3">
                                <h1>¡Haz click para iniciar sesion o registrarte
                                    y empieza a jugar!</h1>
                            </button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row gx-5 mt-4">
                <hr class="mt-5 bg-success border-2 border-top border-success">
                <div class="col-lg-6 mb-lg-0 mt-5">
                    <h3>Roadmap - Planificación</h3>
                    <hr>
                    <p>Aqui podeis ver nuestra planificacion de desarrollo,
                        la idea es añadirlo todo a lo largo de este año. <br><br>
                        Intentaremos retrasar las nuevas actualizaciones lo
                        menos posible <br><br>
                        Esperamos que todos entendais el tiempo de desarrollo
                        que llevan estas mejoras y nuevos contenidos</p>

                    <h5>Estas son las mejoras mas relevantes que vamos a añadir:
                    </h5>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item">Desarrollo del inventario
                            y tienda</li>
                        <li class="list-group-item">Potenciadores temporales</li>
                        <li class="list-group-item">Sistema de mejoras Tier
                            1, Tier 2 y Tier 3</li>
                        <li class="list-group-item">Objetos y forma de
                            conseguirlos</li>
                    </ul>
                </div>
                <div class="col-lg-5 mb-lg-0 mt-5 m-auto">
                    <a href="./img/roadmap.png" target="_blank">
                        <img class="img-fluid" src="./img/roadmap.png" alt="">
                    </a>
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
    include './inc/footer.php';
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>