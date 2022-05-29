<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

/* 
* validaUsuario.php
* Módulo secundario que valida o autentifica un usuario.
*/

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** Si ha llegado al navegador el parametro politica-cookies se crea la cookie politica */
if (isset($_REQUEST['politica-cookies'])) {
    /** Creamos la duracion de la cookie, sera de un año */
    $caducidad = time() + (60 * 60 * 24 * 365);
    /** Cremos la cookie asignandole la caducidad */
    setcookie('politica', '1', $caducidad);
}

/** Si tenemos creada la cookie de politicas ... */
if (isset($_COOKIE['politica'])) {
    /** Si hemos marcado la casilla de verificación de recordar datos... */
    if (isset($_POST['recordar'])) {
        /** Crea las cookies. */
        setcookie('email', $_POST['email'], time() + (60 * 60 * 24 * 90));
        setcookie('contraseña', $_POST['contraseña'], time() + (60 * 60 * 24 * 90));
        setcookie('recordar', 'on', time() + (60 * 60 * 24 * 90));
    } else {
        /** En caso contrario, borra las cookies. */
        setcookie('email', '', time() - 3600);
        setcookie('contraseña', '', time() - 3600);
        setcookie('recordar', '', time() - 3600);
    }
}
?>

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
                        Inicio de Sesion</h2> <br>
                </div>
            </div>
            <?php
            /** Si no existe la variable de sesión usuario. */
            if (!isset($_SESSION['usuario'])) {
            ?>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6 mb-lg-0">
                        </h4> <br>
                        <?php
                        /** Si todos los campos del formulario tienen algún valor... */
                        if (!empty($_POST['email']) && !empty($_POST['contraseña'])) {
                            /** @var Usuario Instancia un objeto de la clase. */
                            $usuario = new Usuario();
                            /** Inicializa los atributos del objeto. */
                            $errorEmail = $usuario->setEmail($_POST['email']);
                            $errorContraseña = $usuario->setContraseña($_POST['contraseña']);

                            if (!$errorEmail && !$errorContraseña) {
                                $usuario->setEmail($_POST['email']);
                                $usuario->setContraseña($_POST['contraseña']);
                                /** Valida el email y la contraseña del usuario. */
                                if ($usuario->validaUsuario()) {
                                    /** Creo una variable de sesion con los datos del objeto usuario */
                                    $_SESSION['usuario'] = $usuario;
                                    /** El usuario se ha validado correctamente. */

                                    /** @var Tropas Instancia un objeto de la clase. */
                                    $tropas = new Tropas();
                                    $tropas->setIdPartidas($usuario->getIdPartidas());

                                    /** @var Personaje Instancia un objeto de la clase. */
                                    $personaje = new Personaje();
                                    $personaje->setIdPartidas($usuario->getIdPartidas());

                                    /** Si el usuario tiene una partida creada */
                                    if (($tropas->buscarPartida($tropas->getIdPartidas())) and ($personaje->buscarPartida($personaje->getIdPartidas()))) {
                                        /** Creamos una variable de sesion con los datos de la partida */
                                        $_SESSION['tropas'] = $tropas;
                                        $_SESSION['personaje'] = $personaje;
                        ?>
                                        <h4 class="text-center">El usuario ha sido validado con éxito <br><br>
                                            Accediendo al área privada del usuario...</h4>
                                    <?php
                                        header('refresh:3; url=areaUsuario.php');
                                    } else {
                                    ?>
                                        <h4 class="text-center">El usuario ha sido validado con éxito.</h4>
                                        <h4 class="text-center mt-5">¿Te gustaria crear una partida?</h4><br>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-success btn-lg btnGestion mx-2" href="./validaPartida.php">¡Si!</a>
                                            <a class="btn btn-success btn-lg btnGestion mx-2" href="./areaUsuario.php">No, mas tarde...</a> <br>
                                        </div>
                                    <?php
                                    }
                                    /** Redirecciona al módulo de usuario validado. */
                                } else {
                                    /** No es posible validar el usuario. */
                                    ?>
                                    <h5 class="text-center">Error al validar el usuario
                                        <br><br> El email o la contraseña del usuario no son
                                        correctos
                                    </h5>
                            <?php
                                    header('refresh:2; url=accesoUsuario.php');
                                }
                            } else {
                                /** Error en el email o en la contraseaña. */
                                echo '<h5 class="text-center">Datos introduccidos incorrectos <br><br> 
                                El email o la contraseña del usuario no son correctos</h5>';
                                header('refresh:2; url=accesoUsuario.php');
                            }
                        } else {
                            ?>
                            <button class="btn btn-primary btn-lg w-100 text-center" disabled>Entrar a Jugar</button>
                            <?php
                            /** Comprobamos si los campos de inicio de sesion tienen valores */
                            if (isset($_POST['email']) || isset($_POST['contraseña'])) {
                            ?>
                                <h5 class="text-center">Error al validar el usuario <br><br>Todos los campos son obligatorios</h5>
                            <?php
                                header('refresh:2; url=accesoUsuario.php');
                            } else {
                            ?>
                                <br>
                                <h5 class="text-center">Debes validar un usuario para acceder</h5>
                            <?php
                                header('refresh:2; url=accesoUsuario.php');
                            }
                            ?>
                            <a href="./accesoUsuario.php">
                                <button class="btn btn-secondary w-100 mt-3">
                                    Volver atras</button></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            } else {
                /** El usuario ya ha sido validado. */
                echo '<h5 class="text-center">El usuario ya ha sido validado</h5>';
                header('refresh:3; url=areaUsuario.php');
            }

            ?>
        </div>
        <?php
        /** Si la cookie politica no esta creada y el navegador no recibio el parametro de politica-cookies, muestra el aviso */
        if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])) : ?>
            <!-- TOAST - MENSAJE -->
            <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 11">
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