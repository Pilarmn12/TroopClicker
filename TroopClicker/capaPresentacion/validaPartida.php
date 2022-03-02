<?php

/** Incluye la clase. */
include '../capaNegocio/partida.php';
include '../capaNegocio/usuario.php';


/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
        * validaPartida.php
        * Módulo secundario que comprueba las partidas y permite gestionarlas
        * al usuario.
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Partidas - TC</title>
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
                    <h2 class="text-center text-decoration-underline fw-bold">
                        Gestiona tu partida</h2>
                </div>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 mb-lg-0">

                    <h4 class="text-center fw-bold">¿Que quieres hacer?</h4> <br>

                    <?php
                    if (!isset($_SESSION['partida'])) {
                        /** @var Usuario Instancia un objeto de la clase. */
                        $partida = new Partida();
                        /** Inicializa los atributos del objeto. */
                        $partida->setIdPartidas($_SESSION['usuario']->getIdPartidas());
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



                        $id = $partida->getIdPartidas();
                        if (!$partida->buscarPartida($id)) {
                            /** Intenta almacenar al usuario y comprueba error. */
                            if ($partida->almacenaPartida()) {

                                /** El usuario se ha registrado correctamente. */
                                echo '<h4 class="text-center">El usuario ha sido'
                                    . ' almacenado con éxito</h4>';
                                $_SESSION['partida'] = $partida;
                    ?>
                                <div class="row justify-content-center">
                                    <div class="col-md-auto col-md-offset-3 mt-5">
                                        <!-- Muestra la posibilidad de ver la información. -->
                                        <p class="centra fs-5">
                                            ¿Deseas ver la información del
                                            usuario?
                                        </p>

                                        <form action="areaUsuario.php" method="post">
                                            <input class="btn btn-success
                                                       btn-lg w-100 mt-3" type="submit" value="Volver al perfil">
                                        </form>
                                    </div>
                                </div>
                    <?php
                            } else {
                                echo '<h4 class="text-center">Error al crear'
                                    . ' la partida, intentelo de nuevo.</h4>';
                                header('refresh:5; url=accesoUsuario.php');
                            }
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