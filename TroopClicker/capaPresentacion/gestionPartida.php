<?php

/** Incluye la clase. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/partida.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
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
    include './inc/navbar.php';
    ?>

    <section class="py-5 border-bottom" id="features">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        /** @var Partida Instancia un objeto de la clase Partida. */
                        $partida = new Partida();
                        /** Inicializa los atributos del objeto Usuario. */
                        $partida->setIdPartidas($_SESSION['usuario']->getIdPartidas());

                        if (isset($_POST['abrirPartida']) || isset($_POST['crearPartida']) || isset($_POST['eliminarPartida'])) {

                            if (isset($_POST['abrirPartida'])) {
                                /** Comprueba si existe la partida del usuario. */
                                if ($partida->buscarPartida($_POST['idPartidas'])) {
                    ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Cargando Partida</h2> <br>

                                <?php
                                    echo '<h4 class="text-center">La partida se ha '
                                        . 'cargado con exito</h4> <br>';
                                    /** @var Usuario Instancia un objeto de la clase. */
                                    $usuario = new Usuario();
                                    /** Inicializa los atributos del objeto. */
                                    $usuario->setEmail($_POST['email']);
                                    $usuario->setContraseña($_POST['contraseña']);
                                    $usuario->setNombre($_POST['nombre']);
                                    $usuario->setIdPartidas($_POST['idPartidas']);
                                    header('refresh:3; url=indexJuego.php');

                                    /** Envia los datos del usuario y su partida al juego. */
                                } else {
                                    /** Si la partida no existe salta un error */
                                ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Error Cargando Partida</h2> <br>
                                <?php
                                    echo '<h5 class="text-center">La partida no existe, 
                                para entrar a la partida primero
                             debe crearla desde la gestion de partidas</br>
                             Vuelva a iniciar sesion para poder hacerlo</h5>';
                                    header('refresh:5; url=areaUsuario.php');
                                }
                            }

                            /** Si se ha seleccionado el botón de Crear / Cargar Partida. */
                            if (isset($_POST['crearPartida'])) {
                                /** Si la partida no existe, intenta crear el usuario */
                                if (!$partida->buscarPartida($_SESSION['usuario']->getIdPartidas())) {
                                ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Creando Partida</h2> <br>

                                    <?php
                                    echo '<h4 class="text-center">La partida se esta creando...</h4> <br>';
                                    /** @var Usuario Instancia un objeto de la clase. */
                                    $usuario = new Usuario();
                                    /** Inicializa los atributos del objeto Usuario. */
                                    $usuario->setEmail($_SESSION['usuario']->getEmail());
                                    $usuario->setContraseña($_SESSION['usuario']->getContraseña());
                                    $usuario->setNombre($_SESSION['usuario']->getNombre());
                                    $usuario->setIdPartidas($_SESSION['usuario']->getIdPartidas());

                                    /** @var Partida Instancia un objeto de la clase. */
                                    /** Inicializa los atributos del objeto Partida. */
                                    $partida = new Partida();
                                    $partida->setIdPartidas($_POST['idPartidas']);
                                    $partida->setMonedas("0");
                                    $partida->setDaño("0");
                                    $partida->setTrampas("0");
                                    $partida->setCampesinos("0");
                                    $partida->setGarroteros("0");
                                    $partida->setEspadasCortas("0");
                                    $partida->setEscuderos("0");
                                    $partida->setLanceros("0");
                                    $partida->setHachas("0");
                                    $partida->setCaballeros("0");
                                    $partida->setHonderos("0");
                                    $partida->setArqueros("0");
                                    $partida->setBallesteros("0");
                                    $partida->setSacerdotes("0");
                                    $partida->setMagos("0");
                                    $partida->setCatapultas("0");

                                    /** Intenta almacenar la partida y comprueba error. */
                                    if ($partida->almacenaPartida()) {
                                        /** La partida se ha creado correctamente. */
                                        echo "<h4 class='text-center'>¡Felicidades "
                                            . "<strong>" . $_POST['nombre'] . "</strong> "
                                            . "tu partida ha sido creada con exito!"
                                            . "</br></br> ¡Empieza a jugar!</h4>";
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
                                        header('refresh:5; url=gestionPartida.php');
                                    }
                                } else {
                                    ?>
                                    <h2 class="text-center text-decoration-underline fw-bold">
                                        Error Creando Partida</h2> <br>
                                <?php
                                    echo '<h5 class="text-center">La partida ya existe, '
                                        . 'para crear una nueva primero debe borrar la anterior. '
                                        . '</br> Vuelva a iniciar sesion para poder hacerlo</h5>';

                                    header('refresh:5; url=areaUsuario.php');
                                }
                            }
                            /** Si se ha seleccionado el botón Eliminar. */
                            if (isset($_POST['eliminarPartida'])) {

                                if ($partida->buscarPartida($_POST['idPartidas'])) {
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
                                    header('refresh:5; url=areaUsuario.php');
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
                                if (isset($_SESSION['partida'])) {
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
    </section>
    <!-- Footer-->
    <?php
    include './inc/footerFixed.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>

</html>