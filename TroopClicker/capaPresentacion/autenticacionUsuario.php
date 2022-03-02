<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
        * autenticacionUsuario.php
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
                        <h4 class="text-center fw-bold">¿Quieres empezar a jugar?
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
                        ?>
                                <h4 class="text-center">El usuario ha sido validado con éxito.
                                    <br><br> Accediendo al área privada del usuario...
                                </h4>
                            <?php
                                /** Redirecciona al módulo de usuario validado. */
                                header('refresh:2; url=areaUsuario.php');
                            } else {
                                /** No es posible validar el usuario. */
                                echo "<h5>Error al validar el usuario
                                        <br>El email o la contraseña del usuario no son
                                        correctos</h5>";
                            }
                        } else {
                            ?>
                            <button class="btn btn-primary btn-lg w-100 text-center" disabled>Entrar a Jugar</button>
                            <?php
                            /** Comprobamos si los campos de inicio de sesion tienen valores */
                            if (isset($_POST['email']) || isset($_POST['contraseña'])) {

                                echo '<h5 class="text-center"><br>Error al 
                                    validar el usuario <br><br>Todos los 
                                    campos son obligatorios</h5>';
                            } else {
                                echo '<h5 class="text-center"><br> Debes '
                                    . 'validar un usuario para acceder</h5>';
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
                header('refresh:2; url=areaUsuario.php');
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