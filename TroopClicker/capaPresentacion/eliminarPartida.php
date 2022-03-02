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
    <!-- Icono Web -->
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
                        Eliminar Partida</h3> <br>
                    <?php
                    /** Incluye la clase Usuario. */
                    include '../capaNegocio/partida.php';


                    /** Comprueba que se ha pulsado el botón Eliminar. */
                    if (isset($_POST['eliminar'])) {
                        /** @var Partida Instancia un objeto de la clase Usuario. */
                        $partida = new Partida();
                        /** Inicializa los atributos del objeto. */
                        $partida->setIdPartidas($_POST['idPartidas']);

                        $id = $_POST['idPartidas'];

                        if ($partida->existePartida($id)) {
                            /** Comprueba la eliminación... */
                            if ($partida->eliminaPartida($id)) {
                                /** Usuario eliminado correctamente. */
                                echo '<h4 class="text-center">La partida se ha eliminado con exito</h4>';
                            } else {
                                /** Error en el archivo al eliminar el usuario. */
                                echo '<h5 class="text-center">Error al eliminar '
                                    . 'la partida del usuario</h5>';
                            }
                        } else {
                            echo '<h5 class="text-center">Error al eliminar la '
                            . 'partida <br><br> Para poder eliminar la partida '
                                    . 'debes tener una creada </h5>';
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