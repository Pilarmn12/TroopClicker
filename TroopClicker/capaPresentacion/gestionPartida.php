<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

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
        * gestionPartida.php
        * Módulo secundario que permite cargar y gestionar la partida del usuario
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
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <?php
                    /** Si existe la variable de sesión usuario. */
                    if (isset($_SESSION['usuario'])) {
                        /** @var Tropas Instancia un objeto de la clase Partida. */
                        $tropas = new Tropas();
                        /** @var Personaje Instancia un objeto de la clase Partida. */
                        $personaje = new Personaje();
                        /** Inicializa los atributos del objeto Tropas y Personaje. */
                        $tropas->setIdPartidas($_SESSION['usuario']->getIdPartidas());
                        $personaje->setIdPartidas($_SESSION['usuario']->getIdPartidas());

                        /** Si ha seleccionado alguno de estos botones */
                        if (isset($_POST['abrirPartida']) || isset($_POST['crearPartida']) || isset($_POST['eliminarPartida'])) {
                            /** Si se ha seleccionado el botón de Abrir / Cargar Partida. */
                            if (isset($_POST['abrirPartida'])) {
                                /** Comprueba si existe la partida del usuario. */
                                if (($tropas->buscarPartida($_SESSION['usuario']->getIdPartidas())) and ($personaje->buscarPartida($_SESSION['usuario']->getIdPartidas()))) {
                                    echo '<h2 class="text-center text-decoration-underline fw-bold">
                                        Cargando Partida</h2><br>';
                                    echo '<h4 class="text-center">La partida se ha '
                                        . 'cargado con exito</h4> <br>';

                                    /** @var Usuario Instancia un objeto de la clase. */
                                    $usuario = new Usuario();
                                    /** Inicializa los atributos del objeto. */
                                    $usuario->setEmail($_SESSION['usuario']->getEmail());
                                    $usuario->setContraseña($_SESSION['usuario']->getContraseña());
                                    $usuario->setNombre($_SESSION['usuario']->getNombre());
                                    $usuario->setIdPartidas($_SESSION['usuario']->getIdPartidas());

                                    /** Redireccon a la pagina indexJuego.php 
                                     * Envia los datos del usuario y su partida al juego. */
                                    header('refresh:3; url=indexJuego.php');
                                } else {
                                    /** Si la partida no existe salta un error */
                                    echo '<h2 class="text-center text-decoration-underline fw-bold">
                                        Error Cargando Partida</h2><br>';
                                    echo '<h5 class="text-center">La partida no existe, 
                                            para entrar a la partida primero debe crearla 
                                            desde la gestion de partidas</br> Vuelva a 
                                            iniciar sesion para poder hacerlo</h5>';

                                    /** Redireccon a la pagina areaUsuario.php */
                                    header('refresh:5; url=areaUsuario.php');
                                }
                            }

                            /** Si se ha seleccionado el botón de Crear Partida. */
                            if (isset($_POST['crearPartida'])) {
                                /** Si la variable de sesion partida no esta creada */
                                if ((!isset($_SESSION['tropas'])) and (!isset($_SESSION['personaje']))) {
                                    /** Si la partida no existe en la BD, intenta crearla */
                                    if ((!$tropas->buscarPartida($_SESSION['usuario']->getIdPartidas())) and (!$personaje->buscarPartida($_SESSION['usuario']->getIdPartidas()))) {
                                        echo '<h2 class="text-center text-decoration-underline fw-bold">
                                            Creando Partida</h2> <br>';
                                        echo '<h4 class="text-center">La partida se esta creando...</h4> <br>';

                                        /** @var Tropas Instancia un objeto de la clase. */
                                        $tropas = new Tropas();
                                        /** Inicializa los atributos del objeto Tropas. */
                                        $tropas->setIdPartidas($_POST['idPartidas']);
                                        $tropas->setDaño("0");
                                        $tropas->setTrampas("0");
                                        $tropas->setCampesinos("0");
                                        $tropas->setGarroteros("0");
                                        $tropas->setEspadasCortas("0");
                                        $tropas->setEscuderos("0");
                                        $tropas->setLanceros("0");
                                        $tropas->setHachas("0");
                                        $tropas->setCaballeros("0");
                                        $tropas->setHonderos("0");
                                        $tropas->setArqueros("0");
                                        $tropas->setBallesteros("0");
                                        $tropas->setSacerdotes("0");
                                        $tropas->setMagos("0");
                                        $tropas->setCatapultas("0");

                                        /** @var Personaje Instancia un objeto de la clase. */
                                        $personaje = new Personaje();
                                        /** Inicializa los atributos del objeto Tropas. */
                                        $personaje->setIdPartidas($_POST['idPartidas']);
                                        /** Si no encuentra personaje, inicia los atributos a 0 */
                                        $primeraParte = substr((strtolower($_SESSION['usuario']->getNombre())), 0, 4);
                                        $nrRand = rand(100, 9999);

                                        $user = $primeraParte . $nrRand;
                                        $personaje->setAlias($user);
                                        $personaje->setNivel("1");
                                        $personaje->setExp("0");
                                        $personaje->setMonedas("0");
                                        $personaje->setFuerza("0");
                                        $personaje->setDestreza("0");
                                        $personaje->setCarisma("0");

                                        /** Intenta almacenar la partida y comprueba error. */
                                        if (($tropas->almacenaPartida()) and ($personaje->almacenaPartida())) {
                                            /** La partida se ha creado correctamente. */
                                            echo "<h4 class='text-center'>¡Felicidades "
                                                . "<strong>" . $_POST['nombre'] . "</strong> "
                                                . "tu partida ha sido creada con exito!"
                                                . "</br></br> ¡Empieza a jugar!</h4>";

                                            /** Creamos la variable de sesion con los datos del objeto partida. */
                                            $_SESSION['tropas'] = $tropas;
                                            $_SESSION['personaje'] = $personaje;

                                            header('refresh:3; url=indexJuego.php');
                    ?>
                                            <div class="row justify-content-center">
                                                <div class="col-md-auto col-md-offset-3 mt-5">
                                                    <!-- Muestra la posibilidad de ver la información. -->
                                                    <form action="indexjuego.php" method="post">
                                                        <input type="hidden" name="email" value="<?php echo  $_SESSION['usuario']->getEmail(); ?>">
                                                        <input type="hidden" name="contraseña" value="<?php echo $_SESSION['usuario']->getContraseña(); ?>">
                                                        <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario']->getNombre(); ?>">
                                                        <input type="hidden" name="idPartidas" value="<?php echo $_SESSION['usuario']->getIdPartidas(); ?>">
                                                        <input class="btn btn-success btn-lg" type="submit" value="Entrar a Troop Clicker">
                                                    </form>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <h2 class="text-center text-decoration-underline fw-bold">
                                                Error Creando Partida</h2> <br>
                                        <?php
                                            /** Se ha producido un error al almacenar la partida. */
                                            echo '<h5 class="text-center">Se ha producido un'
                                                . ' error al intentar guardar la partida, '
                                                . 'inicie sesion y vuelva a intentarlo</h5>';
                                            header('refresh:3; url=gestionPartida.php');
                                        }
                                    } else {
                                        ?>
                                        <h2 class="text-center text-decoration-underline fw-bold">
                                            Error Creando Partida</h2> <br>
                                    <?php
                                        echo '<h5 class="text-center">La partida ya existe, '
                                            . 'para crear una nueva primero debe borrar la anterior. '
                                            . '</br> Vuelva a iniciar sesion para poder hacerlo</h5>';
                                        header('refresh:3; url=areaUsuario.php');
                                    }
                                } else {
                                    /** El usuario no ha sido validado. */
                                    echo '<h2 class="text-center fw-bold">¡Error!</h2>';
                                    echo '<h4 class="text-center">Error al crear la partida,  
                                    si el error continua <br> cierra sesion y vuelve a intentarlo mas tarde. </h4>';
                                    header('refresh:3; url=areaUsuario.php');
                                    /** Incluimos el archivo PHP que contiene el Footer Fixed, es una variante del footer */
                                    include './inc/footerFixed.php';
                                }
                            }
                            /** Si se ha seleccionado el botón Eliminar. */
                            if (isset($_POST['eliminarPartida'])) {

                                if (($tropas->buscarPartida($_POST['idPartidas'])) and ($personaje->buscarPartida($_POST['idPartidas']))) {
                                    ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Eliminando Partida</h2> <br>
                                    <?php
                                    echo '<h4 class="text-center">La partida está '
                                        . 'siendo eliminada...</h4>';
                                    /** Muestra un formulario de confirmación. */
                                    ?>
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto col-md-offset-3 mt-5">
                                            <br>
                                            <form action="eliminarPartida.php" method="post">
                                                <label class="fs-4">¿Estás seguro
                                                    de eliminar la partida del usuario <strong>
                                                        <?php echo $_POST['nombre']; ?>
                                                    </strong>?</label>
                                                <br>
                                                <input type="hidden" name="email" value="<?php echo  $_SESSION['usuario']->getEmail(); ?>">
                                                <input type="hidden" name="contraseña" value="<?php echo $_SESSION['usuario']->getContraseña(); ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario']->getNombre(); ?>">
                                                <input type="hidden" name="idPartidas" value="<?php echo $_SESSION['usuario']->getIdPartidas(); ?>">

                                                <input class="btn btn-success btn-lg" type="button" value="Cancelar" onClick="javascript:window.history.back();">
                                                <input class="btn btn-danger btn-lg" type="submit" name="eliminar" value="Eliminar">
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Error Eliminando Partida</h2> <br>
                            <?php
                                    /** Se ha producido un error al registrar el usuario. */
                                    echo '<h5 class="text-center">Se ha producido un '
                                        . 'error al intentar eliminar la partida, <br><br> '
                                        . 'es probable que su usuario no tenga ninguna partida</h5>';
                                    header('refresh:3; url=areaUsuario.php');
                                }
                            }
                        } else {
                            ?>
                            <!-- Muestra el formulario de gestión de datos. -->
                            <h2 class="text-center text-decoration-underline fw-bold">Gestion de Partida</h2> <br>
                            <h4 class="text-center">¿Que quieres hacer?</h4><br>
                            <div class="alert alert-warning mb-3" role="alert">
                                ¡Recuerda! Para empezar a jugar primero debes crear la partida
                            </div>
                            <form action="gestionPartida.php" method="post" class="my-5">
                                <!-- Datos ocultos que se envian a la gestion de partida -->
                                <input type="hidden" name="email" value="<?php echo  $_SESSION['usuario']->getEmail(); ?>">
                                <input type="hidden" name="contraseña" value="<?php echo $_SESSION['usuario']->getContraseña(); ?>">
                                <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario']->getNombre(); ?>">
                                <input type="hidden" name="idPartidas" value="<?php echo $_SESSION['usuario']->getIdPartidas(); ?>">
                                <?php
                                /** Comprobamos que exista la partida */
                                if ((isset($_SESSION['tropas'])) and isset($_SESSION['personaje'])) {
                                    /** Si la partida existe permitimos entrar directo al juego */
                                ?>
                                    <input class="btn btn-success btn-lg text-center" style="width: 47%; margin-right:5%;" type="submit" name="abrirPartida" value="Iniciar Partida">
                                    <input class="btn btn-success btn-lg text-center" style="width: 47%;" type="submit" name="crearPartida" value="Crear Partida"><br><br>
                                    <input class="btn btn-danger btn-lg text-center" style="width: 100%;" type="submit" name="eliminarPartida" value="Eliminar Partida">
                                <?php
                                } else {
                                    /** Si la partida no existe deshabilitamos el 
                                     * boton para entrar al juego */
                                ?>
                                    <input class="btn btn-success btn-lg text-center disabled" style="width: 47%; margin-right:5%;" type="submit" name="abrirPartida" value="Iniciar Partida">
                                    <input class="btn btn-success btn-lg text-center" style="width: 47%;" type="submit" name="crearPartida" value="Crear Partida"><br><br>
                                    <input class="btn btn-danger btn-lg text-center" style="width: 100%;" type="submit" name="eliminarPartida" value="Eliminar Partida">
                                <?php
                                } ?>
                            </form>
                    <?php
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
        <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])) : ?>
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
    include './inc/footerFixed.php';
    ?>
    <script src="./js/cookies.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>

</html>