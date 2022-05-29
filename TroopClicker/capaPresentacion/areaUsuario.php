<?php

/** Incluye la clase Usuario */
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
        * validaUsuario.php
        * Módulo secundario que valida o autentifica un usuario.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Usuarios - TC</title>
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
                    <h2 id="tituloValidaUser" class="text-center 
                        text-decoration-underline fw-bold">
                        Bienvenido al area del usuario</h2> <br>
                </div>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-7 mb-lg-0 text-center">
                    <?php
                    /** Comprueba si el usuario ha iniciado sesión. */
                    if (isset($_SESSION['usuario'])) {
                        /** El usuario se ha registrado o validado correctamente. */
                    ?>
                        <h4 class="text-center fw-bold">¿Que quieres hacer?
                        </h4> <br>
                        <a class="btn btn-success btn-lg btnGestion w-100 mb-3" href="./indexJuego.php">Entrar a Jugar</a>
                        <a class="btn btn-secondary btn-lg btnGestion m-3" href="./gestionUsuario.php">Perfil Usuario</a>
                        <a class="btn btn-secondary btn-lg btnGestion m-3" href="./gestionPartida.php">Gestion Partida</a> <br>
                        <a class="btn btn-danger btn-lg w-100 mt-3" href="./desconectar.php">Desconectar</a>
                    <?php
                    } else {
                        /** El usuario no ha sido registrado o validado. */
                        echo ' <h4 class="text-center fw-bold">¡Problemas!</h4>
                            <br><br>
                            <h5>El usuario no ha sido registrado o validado</h5>';
                        header('refresh:3; url=index.php');
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
        <?php endif; ?>
    </section>
    <!-- Footer-->
    <?php
    /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
    include './inc/footerFixed.php';
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>