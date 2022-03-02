<!--
        * eliminaUsuario.php
        * Módulo secundario que elimina un usuario.
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
    include './inc/navbar.php';
    ?>

    <section class="py-5 border-bottom" id="features">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <h3 class="text-center text-decoration-underline fw-bold">
                        Eliminar usuarios</h3> <br>
                    <?php
                    /** Incluye la clase Usuario. */
                    include '../capaNegocio/usuario.php';

                    /** Comprueba que se ha pulsado el botón Eliminar. */
                    if (isset($_POST['eliminar'])) {
                        /** @var Usuario Instancia un objeto de la clase Usuario. */
                        $usuario = new Usuario();
                        /** Inicializa los atributos del objeto. */
                        $usuario->setEmail($_POST['email']);
                        $usuario->setContraseña($_POST['contraseña']);
                        $usuario->setNombre($_POST['nombre']);

                        /** Comprueba la eliminación... */
                        if ($usuario->eliminaUsuario()) {
                            /** Usuario eliminado correctamente. */
                            echo '<h4 class="text-center">El usuario ha sido '
                                . 'elimado con éxito</h4>';
                            header("refresh:3; url=desconectar.php");
                        } else {
                            /** Error en el archivo al eliminar el usuario. */
                            echo '<h5 class="text-center">Error al eliminar '
                                . 'el usuario</h5>';
                            header("refresh:3; url=areaUsuario.php");
                        }
                    } else {
                        /** Datos del usuario inconsistentes. */
                        echo '<h5 class="text-center">Debes validar un '
                            . 'usuario para eliminarlo</h5>';
                        header("refresh:3; url=areaUsuario.php");
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