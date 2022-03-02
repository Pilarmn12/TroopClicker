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
                        Registrar usuario</h2> <br>
                    <?php
                    /** Incluye la clase Usuario. */
                    include '../capaNegocio/usuario.php';

                    /** Si todos los campos del formulario tienen algún valor... */
                    if (
                        !empty($_POST['email']) && !empty($_POST['contraseña']) &&
                        !empty($_POST['nombre'])
                    ) {
                        /** @var Usuario Instancia un objeto de la clase. */
                        $usuario = new Usuario();

                        /** Inicializa los atributos del objeto Usuario. */
                        $usuario->setEmail($_POST['email']);
                        $usuario->setContraseña($_POST['contraseña']);
                        $usuario->setNombre($_POST['nombre']);

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
                                            ¿Deseas ver la información del
                                            usuario?
                                        </p>

                                        <form action="validaUsuario.php" method="post">

                                            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                                            <input type="hidden" name="contraseña" value="<?php echo $_POST['contraseña']; ?>">
                                            <input class="btn btn-success 
                                                   btn-lg w-100 mt-3" type="submit" value="Ver usuario">
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
    </section>
    <!-- Footer-->
    <?php
    include './inc/footerFixed.php';
    ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>

</html>