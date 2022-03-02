<!--
        * guardarpartida.php
        * Módulo secundario que guarda la partida del usuario.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardado Partida - TC</title>
    <link rel="icon" href="./img/Logo.png" />
    <!-- Base CSS para Index y Gestion Usuario (incluye Bootstrap)-->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/formAccesoUsuarios.css">
</head>

<body>
    <?php
    include './inc/navbar.php' ;
    ?>

    <section class="py-5 border-bottom" id="features">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <h3 class="text-center text-decoration-underline fw-bold">
                        Guardado de Partida</h3> <br>
                    <?php
                    /** Incluye la clase Partida. */
                    include '../capaNegocio/partida.php';

                    /** @var Partida Instancia un objeto de la clase. */
                    /** Inicializa los atributos del objeto Partida. */
                    $partida = new Partida();

                    $idPartida = $_POST['idPartidas'];
                    $idInt = (int)$idPartida;

                    if ($partida->buscarPartida($idInt)) {
                        /** Comprueba la eliminación... */
                        if ($partida->guardarPartida($idInt)) {
                            /** partida guardada correctamente. */
                            echo '<h4 class="text-center">La partida se ha '
                            . 'guardado con exito <br><br> ¡Esperamos que '
                                    . 'vuelvas a continuar la aventura!</h4>';

                        } else {
                            /** Error al guardar la partida. */
                            echo '<h5 class="text-center">Error al eliminar '
                                . 'la partida del usuario</h5>';
                        }
                    } else {
                        echo '<h5 class="text-center">Error al guardar la '
                        . 'partida <br> Lo sentimos, intente volver a iniciar '
                        . 'sesion y en caso de error envie un mensaje '
                        . 'al soporte </h5>';
                    }

                    ?>
                    <br><br><br>
                    <div class="row w-100 align-items-center">
                        <div class="col text-center">
                            <a href="./index.php" class="text-center">
                                <button class="btn btn-lg btn-success w-50">
                                    Volver al Inicio</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php
    include './inc/footerFixed.php' ;
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
</body>

</html>