<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
        * gestionUsuario.php
        * Módulo secundario que modifica o elimina un usuario.
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
                    <h3 class="text-center text-decoration-underline fw-bold">
                        Gestionar usuario</h3> <br>
                    <?php
                    /** Comprueba que la sesión esté iniciada. */
                    if (isset($_SESSION['usuario'])) {
                        /** Si todos los campos del formulario tienen algún valor... */
                        if (
                            !empty($_POST['email']) && !empty($_POST['contraseña']) &&
                            !empty($_POST['nombre'])
                        ) {
                            /** Si se ha seleccionado el botón Modificar. */
                            if (isset($_POST['modificar'])) {
                                echo '<h4 class="text-center">El usuario está '
                                    . 'siendo modificado...</h4> <br>';
                                /** @var Usuario Instancia un objeto de la clase. */
                                $usuario = new Usuario();
                                /** Inicializa los atributos del objeto. */
                                $usuario->setEmail($_POST['email']);
                                $usuario->setContraseña($_POST['contraseña']);
                                $usuario->setNombre($_POST['nombre']);
                                $usuario->setIdPartidas($_POST['idPartidas']);

                                /** Si no se ha modificado el email del usuario... */
                                if ($_POST['email'] == $_POST['email_original']) {
                                    /** Intenta modificar los datos del usuario. */
                                    if ($usuario->modificaUsuario(
                                        $_POST['email_original'],
                                        $_POST['idPartidas_original']
                                    )) {
                                        $_SESSION['usuario']->setContraseña($_POST['contraseña']);
                                        $_SESSION['usuario']->setNombre($_POST['nombre']);
                                        /** Datos del usuario modificados correctamente. */
                                        echo '<h4 class="text-center">Los datos '
                                            . 'del usuario han sido modificados con éxito</h4>';
                                        header('refresh:3; url=areaUsuario.php');
                                    } else {
                                        /** Error al modificar los datos del usuario. */
                                        echo '<h5 class="text-center">Error al '
                                            . 'modificar los datos del usuario</h5>';
                                        $usuario->setEmail($_POST['email_original']);
                                        $usuario->setContraseña($_POST['contraseña_original']);
                                        $usuario->setNombre($_POST['nombre_original']);
                                        $usuario->setIdPartidas($_POST['idPartidas_original']);

                                        header('refresh:5; url=accesoUsuario.php');
                                    }
                                } else {
                                    /** Si se ha modificado el email del usuario se ha de
                                     * comprobar si existe algún usuario con ese email. */
                                    if (!$usuario->existeUsuario()) {
                                        /** No existe ningún usuario con ese email. */
                                        if ($usuario->modificaUsuario(
                                            $_POST['email_original'],
                                            $_POST['idPartidas_original']
                                        )) {
                                            /** Actualiza los valores en la varible de sesión. */
                                            $_SESSION['usuario']->setEmail($_POST['email']);
                                            $_SESSION['usuario']->setContraseña($_POST['contraseña']);
                                            $_SESSION['usuario']->setNombre($_POST['nombre']);
                                            /** Datos del usuario modificados correctamente. */
                                            echo '<h4 class="text-center">Los '
                                                . 'datos del usuario ha sido modificado'
                                                . ' con éxito</h4>';
                                            header('refresh:3; url=areaUsuario.php');
                                        } else {
                                            /** Error al modificar los datos del usuario. */
                                            echo '<h5 class="text-center">Error '
                                                . 'al modificar los datos del usuario</h5>';
                                            $usuario->setEmail($_POST['email_original']);
                                            $usuario->setContraseña($_POST['contraseña_original']);
                                            $usuario->setNombre($_POST['nombre_original']);
                                            $usuario->setIdPartidas($_POST['idPartidas_original']);
                                            header('refresh:5; url=accesoUsuario.php');
                                        }
                                    } else {
                                        /** Ya existe un usuario con ese email. */
                                        echo '<h5 class="text-center">No es 
                                            posible modificar los datos del usuario
                                            <br>Existe otro usuario con el mismo email</h5>';
                                        $usuario->setEmail($_POST['email_original']);
                                        $usuario->setContraseña($_POST['contraseña_original']);
                                        $usuario->setNombre($_POST['nombre_original']);
                                        header('refresh:5; url=accesoUsuario.php');
                                    }
                                }
                            }
                            /** Si se ha seleccionado el botón Eliminar. */
                            if (isset($_POST['eliminar'])) {
                                /** Comprueba si se ha cambiado algún dato del formulario. */
                                if (($_POST['email'] == $_POST['email_original']) &&
                                    ($_POST['contraseña'] == $_POST['contraseña_original']) &&
                                    ($_POST['nombre'] == $_POST['nombre_original']) &&
                                    ($_POST['idPartidas'] == $_POST['idPartidas_original'])
                                ) {

                                    echo '<h4 class="text-center">El usuario está '
                                        . 'siendo eliminado...</h4>';
                                    /** Muestra un formulario de confirmación. */
                    ?>
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto col-md-offset-3 mt-5">
                                            <form action="eliminaUsuario.php" method="post">
                                                <label class="fs-4">¿Estás seguro
                                                    de eliminar el usuario <strong>
                                                        <?php echo $_POST['nombre']; ?>
                                                    </strong>?</label>
                                                <br>
                                                <br>
                                                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                                                <input type="hidden" name="contraseña" value="<?php echo $_POST['contraseña']; ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $_POST['idPartidas_original']; ?>">

                                                <input class="btn btn-success btn-lg" type="button" value="Cancelar" style="width: 200px" onClick="javascript:window.history.back();">
                                                <input class="btn btn-danger btn-lg" style="width: 200px" type="submit" name="eliminar" value="Eliminar">
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo '<h5 class="text-center">No es posible eliminar el usuario
							            <br>Se han modificado sus datos</h5>';
                                    header('refresh:5; url=gestionUsuario.php');
                                }
                            }
                        } else {
                            /** Si algún campo del formulario no está inicializado... */
                            if (
                                isset($_POST['email']) || isset($_POST['contraseña']) ||
                                isset($_POST['nombre'])
                            ) {
                                echo "<h5>Todos los campos son obligatorios</h5>";
                                echo '<nav><a href="javascript:window.history.back();">
                                    Volver a la página anterior</a></nav>';
                            } else {
                                /** Muestra el formulario de gestión de sus datos. */
                                ?>
                                <div class="d-flex justify-content-center">
                                    <form action="gestionUsuario.php" method="post" class="mb-5">
                                        <label>Nombre: </label> <br>
                                        <input type="text" name="nombre" size="50" value="<?php
                                                                                            echo $_SESSION['usuario']->getNombre(); ?>"><br>
                                        <label>Email: </label><br>
                                        <input type="text" name="email" size="50" value="<?php
                                                                                            echo $_SESSION['usuario']->getEmail(); ?>"><br>
                                        <label>Contraseña: </label><br>
                                        <input type="text" name="contraseña" size="50" value="<?php
                                                                                                echo $_SESSION['usuario']->getContraseña(); ?>"><br>
                                        <label>ID: </label><br>
                                        <input type="text" name="idPartidas" size="50" value="<?php
                                                                                                echo $_SESSION['usuario']->getIdPartidas(); ?>"><br>

                                        <br> <br>
                                        <input type="hidden" name="email_original" value="<?php echo  $_SESSION['usuario']->getEmail(); ?>">
                                        <input type="hidden" name="contraseña_original" value="<?php echo $_SESSION['usuario']->getContraseña(); ?>">
                                        <input type="hidden" name="nombre_original" value="<?php echo $_SESSION['usuario']->getNombre(); ?>">
                                        <input type="hidden" name="idPartidas_original" value="<?php echo $_SESSION['usuario']->getIdPartidas(); ?>">

                                        <input class="btn btn-success btn-lg" type="submit" name="modificar" value="Modificar">
                                        <input class="btn btn-success btn-lg" type="button" value="Cancelar" onClick="location.href = 'areaUsuario.php'">
                                        <input class="btn btn-danger btn-lg" type="submit" name="eliminar" value="Eliminar">
                                    </form>
                                </div>
                                <br><br><br>
                    <?php
                            }
                        }
                    } else {
                        /** El usuario no ha sido validado. */
                        echo '<h5 class="text-center">El usuario no ha sido validado correctamente</h5>';
                        header('refresh:5; url=accesoUsuario.php');
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
</body>

</html>