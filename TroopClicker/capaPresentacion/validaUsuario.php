<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/partida.php';

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
                        Inicio de Sesion</h2> <br>
                </div>
            </div>
            <?php
            /** Si no existe la variable de sesión usuario. */
            if (!isset($_SESSION['usuario'])) {
                /** Si todos los campos del formulario tienen algún valor... */
                /** @var Usuario Instancia un objeto de la clase. */
                $usuario = new Usuario();
                /** Inicializa los atributos del objeto. */
                $usuario->setEmail($_POST['email']);
                $usuario->setContraseña($_POST['contraseña']);

            ?>

                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6 mb-lg-0">
                        </h4> <br>
                        <?php
                        /** Si todos los campos del formulario tienen algún valor... */
                        if (!empty($_POST['email']) && !empty($_POST['contraseña'])) {
                            /** Valida el email y la contraseña del usuario. */
                            if ($usuario->validaUsuario()) {
                                /** Muestra la información del usuario. */
                                /** @var Usuario Crea la variable de sesión con un objeto
                                 * que pertenece a la clase Usuario. */
                                $_SESSION['usuario'] = $usuario;
                                /** El usuario se ha validado correctamente. */

                                /** @var Partida Instancia un objeto de la clase. */
                                $partida = new Partida();
                                $partida->setIdPartidas($usuario->getIdPartidas());
                                
                                if ($partida->buscarPartida($partida->getIdPartidas())) {
                                    $_SESSION['partida'] = $partida;
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
                                header('refresh:3; url=accesoUsuario.php');
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
                                header('refresh:3; url=accesoUsuario.php');
                            } else {
                            ?>
                                <br>
                                <h5 class="text-center">Debes validar un usuario para acceder</h5>
                            <?php
                                header('refresh:3; url=accesoUsuario.php');
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
                echo "<h5>El usuario ya ha sido validado</h5>";
                header('refresh:3; url=areaUsuario.php');
            }
            ?>
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