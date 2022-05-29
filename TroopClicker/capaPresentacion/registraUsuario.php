<?php

/** Incluye la clase Usuario. */
include '../capaNegocio/usuario.php';
/** Si ha llegado al navegador el parametro politica-cookies se crea la cookie politica */
if (isset($_REQUEST['politica-cookies'])) {
    /** Creamos la duracion de la cookie, sera de un año */
    $caducidad = time() + (60 * 60 * 24 * 365);
    /** Cremos la cookie asignandole la caducidad */
    setcookie('politica', '1', $caducidad);
}
?>
<!--
        * registraUsuario.php
        * Módulo secundario que registra un usuario con los datos que recoge.
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
                    <h2 class="text-center text-decoration-underline fw-bold">
                        Registrar usuario</h2> <br>
                    <?php
                    /** Si todos los campos del formulario tienen algún valor... */
                    if (
                        !empty($_POST['email']) && !empty($_POST['contraseña']) &&
                        !empty($_POST['nombre'])
                    ) {
                        /** @var Usuario Instancia un objeto de la clase. */
                        $usuario = new Usuario();
                        /** @var array[]:string Valida e inicializa la propiedad del objeto. */
                        $errorEmail = $usuario->setEmail($_POST['email']);
                        /** Recorre el array de errores. */
                        foreach ($errorEmail as $error) {
                            /** Muestra posibles errores del email. */
                            echo '<h5 class="text-center">' . $error . '</h5>';
                        }
                        /** @var array[]:string Valida e inicializa la propiedad del objeto. */
                        $errorContraseña = $usuario->setContraseña($_POST['contraseña']);
                        /** Recorre el array de errores. */
                        foreach ($errorContraseña as $error) {
                            /** Muestra posibles errores de la contraseña. */
                            echo '<h5 class="text-center">' . $error . '</h5>';
                        }
                        $errorNombre = $usuario->setNombre($_POST['nombre']);
                        /** Recorre el array de errores. */
                        foreach ($errorNombre as $error) {
                            /** Muestra posibles errores del email. */
                            echo '<h5 class="text-center">' . $error . '</h5>';
                        }
                        /** Comprueba que haya errores en el email y en la contraseña. */
                        if (!$errorEmail && !$errorContraseña && !$errorNombre) {
                            /** Comprueba si existe el usuario. */
                            if (!$usuario->existeUsuario()) {
                                /** Intenta almacenar al usuario y comprueba error. */
                                if ($usuario->almacenaUsuario()) {
                                    /** El usuario se ha registrado correctamente. */
                                    echo '<h4 class="text-center">El usuario ha sido'
                                        . ' almacenado con éxito</h4>';
                    ?>
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto col-md-offset-3 mt-5">
                                            <!-- Muestra la posibilidad de ver la información. -->
                                            <p class="centra fs-5">
                                                ¡Pulsa en el boton para completar el registro y empezar a jugar!
                                            </p>
                                            <form action="validaUsuario.php" method="post">
                                                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                                                <input type="hidden" name="contraseña" value="<?php echo $_POST['contraseña']; ?>">
                                                <input class="btn btn-success 
                                                   btn-lg w-100 mt-3" type="submit" value="Completar Registro">
                                            </form>
                                        </div>
                                    </div>
                            <?php
                                } else {
                                    /** Se ha producido un error al registrar el usuario. */
                                    echo '<h5 class="text-center">Error en el 
                                        archivo al almacenar el usuario</h5>';
                                    header('refresh:5; url=accesoUsuario.php');
                                }
                            } else {
                                /** Se intenta registrar un usuario existente. */
                                echo '<h5 class="text-center">El usuario ya '
                                    . 'existe en el archivo</h5>';
                                header('refresh:5; url=accesoUsuario.php');
                            }
                        } else {
                            echo '<br><h5 class="text-center fw-bold">No es posible registrar el usuario</h5>';
                            ?>
                            <br>
                            <a href="./accesoUsuario.php">
                                <button class="btn btn-secondary w-100">Volver Atras</button>
                            </a>
                    <?php
                        }
                    } else {
                        /** Si algún campo del formulario no está inicializado... */
                        if (
                            isset($_POST['email']) || isset($_POST['contraseña'])
                            || isset($_POST['nombre'])
                        ) {
                            echo '<h5 class="text-center">Error al dar de 
                                    alta el usuario <br>Todos los campos son obligatorios</h5>';
                            header('refresh:5; url=accesoUsuario.php');
                        } else {
                            /** Si se intenta acceder sin registrar un usuario... */
                            echo '<h5 class="text-center">Debes registrar un'
                                . ' usuario para acceder</h5>';
                            header('refresh:5; url=accesoUsuario.php');
                        }
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
    /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
    include './inc/footerFixed.php';
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>

</html>