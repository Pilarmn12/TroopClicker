<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
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
    <!-- Icono Web -->
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
</head>

<body>
    <?php
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
                        header('refresh:5; url=index.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php
    include './inc/footerFixed.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>