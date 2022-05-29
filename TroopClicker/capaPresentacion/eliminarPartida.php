<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
        * eliminapartida.php
        * Módulo secundario que elimina la partida de un usuario.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
</head>

<body>
    <?php
    /** Incluimos el archivo PHP que contiene la barra de navegacion */
    include './inc/navbar.php';
    if ((isset($_SESSION['tropas'])) and (isset($_SESSION['personaje']))) {
    ?>
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <h3 class="text-center text-decoration-underline fw-bold">
                            Eliminar Partida</h3> <br>
                        <?php

                        /** Comprueba que se ha pulsado el botón Eliminar. */
                        if (isset($_POST['eliminar'])) {
                            /** @var Tropas Instancia un objeto de la clase Usuario. */
                            $tropas = new Tropas();
                            /** @var Personaje Instancia un objeto de la clase Usuario. */
                            $personaje = new Personaje();

                            $id = $_SESSION['usuario']->getIdPartidas();

                            if (($tropas->existePartida($id)) and ($personaje->existePartida($id))) {
                                /** Comprueba la eliminación... */
                                if (($tropas->eliminaPartida($id)) and ($personaje->eliminaPartida($id))) {
                                    /** Usuario eliminado correctamente. */
                                    unset($_SESSION["tropas"]);
                                    unset($_SESSION["personaje"]);
                                    echo '<h4 class="text-center">La partida se ha eliminado con exito</h4>';
                                } else {
                                    /** Error en el archivo al eliminar el usuario. */
                                    echo '<h5 class="text-center">Error al eliminar '
                                        . 'la partida del usuario</h5>';
                                    header('refresh:3; url=gestionPartida.php');
                                }
                            } else {
                                echo '<h5 class="text-center">Error al eliminar la '
                                    . 'partida <br><br> Para poder eliminar la partida '
                                    . 'debes tener una creada </h5>';
                                header('refresh:3; url=gestionPartida.php');
                            }
                        } else {
                            /** Datos del usuario inconsistentes. */
                            echo '<h5 class="text-center">Debes validar un '
                                . 'usuario para eliminar su partida</h5>';
                        }
                        ?>
                        <br><br><br>
                        <div class="row w-100 align-items-center">
                            <div class="col text-center">
                                <a href="./areaUsuario.php" class="text-center">
                                    <button class="btn btn-lg btn-success w-50">
                                        Volver al Inicio</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else {
        /** La partida no ha sido validado. */
        echo '<h3 class="text-center">¡Error!</h3>';
        echo '<h5 class="text-center">La partida no existe o no ha cargado correctamente</h5>';
        header("refresh:3; url=areaUsuario.php");
    }

    /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
    include './inc/footerFixed.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>