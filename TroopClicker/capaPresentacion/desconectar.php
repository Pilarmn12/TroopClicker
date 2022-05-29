<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
        * desconectar.php
        * Módulo secundario que cierra la sesion del usuario.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesion - TC</title>
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
                        Cerrando Sesion...</h2> <br>
                </div>
            </div>
            <?php
            /** Comprueba que la sesión esté iniciada. */
            if (isset($_SESSION['usuario'])) {
                echo '<h4 class="text-center">La sesion se ha cerrado.</h4>';
                echo '<h4 class="text-center fw-bold">Adiós ' . $_SESSION['usuario']->getNombre() .
                    '. ¡Esperamos que vuelvas!</h4>';
                /** Elimina todas las variables de sesión. */
                $_SESSION = array();
                /** Finaliza la sesión actual. */
                session_destroy();
                header('refresh:3; url=index.php');
            } else {
                /** El usuario no ha sido validado. */
                echo '<h5 class="text-center">El usuario no ha sido validado</h5>';
                header('refresh:3; url=accesoUsuario.php');
            }
            ?>
        </div>
    </section>
    <?php
    /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
    include './inc/footerFixed.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>