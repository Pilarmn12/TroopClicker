<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
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
    <!-- Icono Web -->
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
    <link rel="stylesheet" href="./css/avisos.css">

</head>

<body>
    <?php
    include './inc/navbar.php';
    ?>

    <?php
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

                            <form action="validaUsuario.php" method="post">
                                <input type="text" name="email" placeholder="Email" />
                                <input type="password" name="contraseña" placeholder="Contraseña" />
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
                                <input type="text" name="nombre" placeholder="Nombre / Alias" pattern="^[A-Z].*" minlength="3" maxlength="25" />
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
        </section>

    <?php
    } else {
        /** El usuario no ha sido validado. */
        echo "<h5>El usuario ya ha sido validado</h5>";
    }
    ?>


    <div id="cajacookies" class="container-fluid">
        <div class="col-auto">
            <button id="botonCookie" class="pull-right">
                <i class="fas fa-times"></i>
                Aceptar y cerrar este mensaje
            </button>
            Éste sitio web usa cookies, si permanece aquí acepta su uso.
            Puede leer más sobre el uso de cookies en nuestra
            <a href="politica.html">política de
                privacidad</a>.
        </div>
    </div>

    <!-- Footer-->
    <?php
    include './inc/footer.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>