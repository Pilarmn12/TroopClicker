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
        * accesoUsuario.php
        * Módulo secundario que permite al usuario registrarse
        * o iniciar sesion con una cuenta existente.
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso de Usuarios - TC</title>
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
</head>

<body>
    <?php
    /** Incluimos el archivo PHP que contiene la barra de navegacion */
    include './inc/navbar.php';
    /** Si no existe la variable de sesión usuario. */
    if (!isset($_SESSION['usuario'])) {
    ?>
        <!-- Header-->
        <header class="bg-dark">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h2 class="fw-bolder text-white mb-2">¡Rapido inicia
                                sesion y no pierdas ni un minuto sin conseguir oro!</h2>
                            <img src="./img/heroRun.gif" id="fotoHeroe" class="mt-3" alt="Logo Troop Clicker"><br>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="border-bottom" id="features">
            <div class="container px-5">
                <div class="row gx-5 mt-5">
                    <div class="col-lg-6 mb-lg-0">
                        <div class="form mt-5" id="inicio">
                            <div class="d-flex justify-content-between">
                                <h4>Inicia sesion:</h4>
                                <img src="./img/Enemigos/esqueleto.gif" alt="Esqueleto">
                            </div>
                            <!-- Inicio de sesion y en caso de tener creada la cookie recordar se cargan los datos automaticamente -->
                            <form action="validaUsuario.php" method="post">
                                <input type="text" name="email" placeholder="Email" value="<?php
                                                                                            if (isset($_COOKIE['email'])) {
                                                                                                print_r($_COOKIE['email']);
                                                                                            } else {
                                                                                                echo '';
                                                                                            }
                                                                                            ?>" />
                                <input type="password" name="contraseña" placeholder="Contraseña" value="<?php
                                                                                                            if (isset($_COOKIE['contraseña'])) {
                                                                                                                print_r($_COOKIE['contraseña']);
                                                                                                            } else {
                                                                                                                echo '';
                                                                                                            }
                                                                                                            ?>" />
                                <input type="checkbox" style="width: 5%;" name="recordar" <?php
                                                                                            if (isset($_COOKIE['recordar'])) {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            }
                                                                                            ?>>

                                <label for="recordar" class="h6"> Recordar datos del usuario</label><br>
                                <button class="btn btn-success" type="submit" value="ValidarLogin"> INICIAR SESION </button>
                                <button class="btn btn-danger" type="reset" value="Cancelar"> CANCELAR </button>
                                <p class="message">¿No tienes cuenta?
                                    <a href="#registro">Crear cuenta</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-lg-0">

                        <div class="form mt-5" id="registro">
                            <div class="d-flex justify-content-between">
                                <h4>Crea tu cuenta:</h4>
                                <img src="./img/Enemigos/esqueletoR.gif" alt="Esqueleto Reacciona">
                            </div>
                            <form action="registraUsuario.php" method="post">
                                <input type="text" name="nombre" placeholder="Nombre / Alias" minlength="3" maxlength="25" />
                                <input type="text" name="email" placeholder="Email" />
                                <input type="password" name="contraseña" placeholder="Contraseña" />
                                <button class="btn btn-success" type="submit" value="Validar"> CREAR CUENTA </button>
                                <button class="btn btn-danger" type="reset" value="Cancelar"> CANCELAR </button>
                                <p class="message">¿Tienes cuenta?
                                    <a href="#inicio">Inicia Sesion</a>
                                </p>
                            </form>

                        </div>
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
    <?php
        /** Incluimos el archivo PHP que contiene el Footer */
        include './inc/footer.php';
    } else {
        /** El usuario no ha sido validado. */
        echo '<h3 class="text-center">¡Error!</h3>';
        echo '<h5 class="text-center">El usuario ya ha sido validado</h5>';
        /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
        include './inc/footerFixed.php';
    }
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>