<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** Esta cookie sirve para contar las visitas del usuario en un dia */
/** Si la cookie ya esta creada, actualiza sus valores */
if (isset($_COOKIE['visitas'])) {
    setcookie('visitas', $_COOKIE['visitas'] + 1, time() + 3600 * 24);
    $mensaje = 'Numero de visitas del dia: ' . $_COOKIE['visitas'];
} else {
    /** Si no, crea la cookie */
    setcookie('visitas', 2, time() + 3600 * 24);
    $mensaje = '¡Bienvenido por primera vez a Troop Clicker!';
}
?>
<!--
        * indexJuego.php
        * Módulo principal de la Aplicacion Web.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troop Clicker</title>
    <link rel="icon" href="./img/Logo.png" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/avisos.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-3 mt-3">
                <div class="container-fluid ">
                    <?php
                    /** @var Usuario Instancia un objeto de la clase. */
                    $usuario = new Usuario();
                    /** Inicializa los atributos del objeto. */
                    $usuario->setEmail($_SESSION['usuario']->getEmail());
                    $usuario->setNombre($_SESSION['usuario']->getNombre());
                    $usuario->setIdPartidas($_SESSION['usuario']->getIdPartidas());

                    /** Si la variable de sesion partida esta creada */
                    if ((isset($_SESSION['tropas'])) and (isset($_SESSION['personaje']))) {

                        /** @var Tropas Instancia un objeto de la clase. */
                        $tropaAux = new Tropas();
                        /** Asignamos la variable sesion a un objeto auxiliar de partida, para manejar los datos */
                        $tropaAux = $_SESSION['tropas'];

                        /** @var Personaje Instancia un objeto de la clase. */
                        $personajeAux = new Personaje();
                        /** Asignamos la variable sesion a un objeto auxiliar de partida, para manejar los datos */
                        $personajeAux = $_SESSION['personaje'];
                    ?>
                        <div class="row justify-content-center">
                            <div id="botonesMejoras">
                                <h2>AREA MEJORAS</h2>
                                <p>Monedas Administrador: </p>
                                <button type="button" class="btn btn-warning" id="monedasAdmin">
                                    50000 monedas
                                </button>
                            </div>

                        </div>
                        <div class="row justify-content-center my-3">
                            <div id="posicionMonedasTotal">
                                <img id="imgMoneda" class="m-4" src="./img/coin.png" alt="Animacion Moneda">
                                <p id="nombreMonedas" class="mt-5 mx-5">Monedas:
                                    <span id="monedasTotal"><?php echo $personajeAux->getMonedas(); ?></span>
                                </p>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div id="datosPersonaje">
                                <div class="row justify-content-between">
                                    <div class="col-md mt-2">
                                        <h6>Nombre: <span id="alias"><?php echo $_SESSION['personaje']->getAlias() ?></span></h6>
                                        <h6>Nivel: <span id="nivelPersonaje"><?php echo $_SESSION['personaje']->getNivel() ?></span></h6>
                                        <h6>¿Monedas por segundo? <br></h6>
                                        <p> Beneficio: <span id="monedasPorSegundo">0</span></p>
                                    </div>
                                    <div class="col-md">
                                        <div class="container" style="display: inline-block">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="progress-outer-vertical progress-bar-vertical">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="progress-value"><span id="pocentExp">0</span>%</div>
                                                                <input type="range" min="0" max="9999999" value="<?php echo $_SESSION['personaje']->getExp() ?>" id="val2" hidden="">
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="progress progress-bar-vertical">
                                                                    <div class="prg-bar" id="bar2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <img src="./img/hero.gif" alt="Heroe" id="heroeImagen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-sm-5 col-md-5 mt-3">
                <div class="container-fluid">
                    <div id="botonesCentrales" class="row justify-content-center">
                        <button id="botonTiendaNavCentral" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#tiendaModal" data-toggle="tooltip" data-placement="bottom" title="Visita al herrero">
                        </button>
                        <button id="botonStatsNavCentral" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#statsModal" data-toggle="tooltip" data-placement="bottom" title="Estadisticas de tu personaje">
                        </button>
                        <button id="botonInventarioNavCentral" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#inventarioModal" data-toggle="tooltip" data-placement="bottom" title="Mochila del personaje">
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div id="posicionEnemigo">

                        <p class="enemyName">Fire Worm - lvl
                            <span class="enemyLvl">1</span>
                        </p>

                        <!-- <div class="prg-border text-start">
                                <div class="prg-bar" id="bar1"></div>
                            </div><br> -->

                        <div class="container">
                            <div class="row">
                                <div class="col-md">
                                    <div class="progress-outer">
                                        <div class="progress">
                                            <div class="prg-bar" id="bar1">
                                                <div class="progress-value"><span id="valorRange">100</span>%</div>
                                                <input type="range" min="0" max="9999999" value="100" id="val1" hidden="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="prg-border">
                                        <div class="prg-bar float-start text-start" id="HPbar"></div>
                                    </div> <br> -->

                        <!-- <input type="range" min="0" max="100" value="80" id="valueHP"><br> -->

                        <button id="fotoEnemigo" class="btn w-100 h-75" alt="Enemigo"></button>

                    </div>
                </div>

                <!-- Alerta conexion -->
                <!-- Esta alerta se mostrara con el mensaje que reciba de la cookie -->
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div id="conexion" class="alert alert-success shadow pb-5 mt-5" role="alert" style="height: 60px; width: 400px;">
                            <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-shield-fill-check" fill="currentColor" style="float:left">
                                <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                            </svg>
                            <p class="font-weight-light"><b><?php echo $mensaje ?></b></p>
                        </div>
                    </div>
                </div>

                <!-- Alerta guardado completo -->
                <div id="guardadoCompleto" class="alert alert-success shadow pb-5 mt-5" role="alert">
                    <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-shield-fill-check" fill="currentColor" style="float:left">
                        <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    </svg>
                    <p class="font-weight-light"><b>¡Partida guardada correctamente!</b></p>
                </div>

                <!-- Alerta error en guardado -->
                <div id="errorGuardado" class="alert alert-danger shadow pb-5 mt-5" role="alert">
                    <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="currentColor">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                    <p class="font-weight-light"><b>¡Error!</b> No se guardo la partida, intentalo de nuevo.</p>
                </div>

            </div>

            <div class="col-sm-5 col-md-4 mt-3">
                <div class="container-fluid justify-content-center">
                    <nav class="nav nav-pills nav-justified">
                        <a class="nav-item" href="#"><img class="botonNav" src="./img/BotonesNav/BotonCuenta.png" alt="Cuenta" data-bs-toggle="modal" data-bs-target="#cuentaModal"></a>
                        <a class="nav-item" href="#"><img class="botonNav" src="./img/BotonesNav/BotonAjustes.png" alt="Ajustes Juego" data-bs-toggle="modal" data-bs-target="#ajustesModal"></a>
                        <a class="nav-item" href="#"><img class="botonNav" src="./img/BotonesNav/BotonStop.png" alt="Pausar / Continuar musica"></a>
                        <a class="nav-item" href="./wikiTC/index.php" target="_blank"><img class="botonNav" src="./img/BotonesNav/BotonWiki.png" alt="Guia Oficial"></a>
                        <a class="nav-item" href="#"><img class="botonNav" id="saveGame" src="./img/BotonesNav/BotonGuardar.png" alt="Guardar Partida"></a>
                    </nav>
                </div>
                <hr> <br>
                <div class="container-fluid">
                    <div id="botonesCompra" class="row justify-content-center
                             example-1 scrollbar-ripe-malinka">

                        <button id="mejoraDaño" class="btn btn-block">
                            <p> Daño por golpe: <br><span id="dañoHeroe">
                                    <?php echo $tropaAux->getDaño(); ?></span> [ <span id="precioMejoraDaño">15</span> ] </p>
                        </button>

                        <button id="comprarTrampa" class="btn btn-block">
                            <p>Crear Trampa: <br><span id="cantidadTrampas">
                                    <?php echo $tropaAux->getTrampas(); ?></span> [
                                <span id="precioTrampa">20</span> ]
                            </p>
                        </button>

                        <button id="comprarCampesino" class="btn btn-block">
                            <p>Campesino: <br><span id="cantidadCampesino">
                                    <?php echo $tropaAux->getCampesinos(); ?></span> [
                                <span id="precioCampesino">100</span> ]
                            </p>
                        </button> <br>

                        <button id="comprarGarrote" class="btn btn-block" disabled>
                            <p>Señor con garrote: <br><span id="cantidadGarrote">
                                    <?php echo $tropaAux->getGarroteros(); ?></span> [
                                <span id="precioGarrote">350</span> ]
                            </p>
                        </button>

                        <button id="comprarEspadaCorta" class="btn btn-block" disabled>
                            <p>Espada Corta: <br><span id="cantidadEspadaCorta">
                                    <?php echo $tropaAux->getEspadasCortas(); ?></span> [
                                <span id="precioEspadaCorta">800</span> ]
                            </p>
                        </button>

                        <button id="comprarEscudero" class="btn btn-block" disabled>
                            <p>Escudero: <br><span id="cantidadEscudero">
                                    <?php echo $tropaAux->getEscuderos(); ?></span> [
                                <span id="precioEscudero">1500</span> ]
                            </p>
                        </button> <br>

                        <button id="comprarLancero" class="btn btn-block" disabled>
                            <p>Lancero: <br><span id="cantidadLancero">
                                    <?php echo $tropaAux->getLanceros(); ?></span> [
                                <span id="precioLancero">2000</span> ]
                            </p>
                        </button>

                        <button id="comprarHacha" class="btn btn-block" disabled>
                            <p>Hacha: <br><span id="cantidadHacha">
                                    <?php echo $tropaAux->getHachas(); ?></span> [
                                <span id="precioHacha">3000</span> ]
                            </p>
                        </button>

                        <button id="comprarCaballero" class="btn btn-block" disabled>
                            <p>Caballero: <br><span id="cantidadCaballero">
                                    <?php echo $tropaAux->getCaballeros(); ?></span> [
                                <span id="precioCaballero">5000</span> ]
                            </p>
                        </button> <br>

                        <button id="comprarHondero" class="btn btn-block" disabled>
                            <p>Hondero: <br><span id="cantidadHondero">
                                    <?php echo $tropaAux->getHonderos(); ?></span> [
                                <span id="precioHondero">1000</span> ]
                            </p>
                        </button>

                        <button id="comprarArquero" class="btn btn-block" disabled>
                            <p>Arquero: <br><span id="cantidadArquero">
                                    <?php echo $tropaAux->getArqueros(); ?></span> [
                                <span id="precioArquero">5000</span> ]
                            </p>
                        </button>

                        <button id="comprarBallestero" class="btn btn-block" disabled>
                            <p>Ballestero: <br><span id="cantidadBallestero">
                                    <?php echo $tropaAux->getBallesteros(); ?></span> [
                                <span id="precioBallestero">10000</span> ]
                            </p>
                        </button> <br>

                        <button id="comprarSacerdote" class="btn btn-block" disabled>
                            <p>Sacerdote: <br><span id="cantidadSacerdote">
                                    <?php echo $tropaAux->getSacerdotes(); ?></span> [
                                <span id="precioSacerdote">15000</span> ]
                            </p>
                        </button>

                        <button id="comprarMago" class="btn btn-block" disabled>
                            <p>Mago: <br><span id="cantidadMago">
                                    <?php echo $tropaAux->getMagos(); ?></span> [
                                <span id="precioMago">30000</span> ]
                            </p>
                        </button>

                        <button id="comprarCatapulta" class="btn btn-block" disabled>
                            <p>Catapulta: <br><span id="cantidadCatapulta">
                                    <?php echo $tropaAux->getCatapultas(); ?></span> [
                                <span id="precioCatapulta">50000</span> ]
                            </p>
                        </button> <br> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL AJUSTES -->
    <div class="modal fade" id="ajustesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ajustesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AJUSTES JUEGO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Quieres usar otro fondo? Elige una de nuestas opciones:</p>
                    <form action="./indexJuego.php" method="post">
                        <div class="caja">
                            <select id="selectFondo">
                                <option value="dia">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="noche"> Noche</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AJUSTES CUENTA -->
    <div class="modal fade" id="cuentaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cuentaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AJUSTES CUENTA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Datos Personales</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nombre Usuario: </th>
                                <td><?php echo $_SESSION['usuario']->getNombre() ?> </td>
                            </tr>
                            <tr>
                                <th scope="row">Email Usuario: </th>
                                <td><?php echo $_SESSION['usuario']->getEmail() ?></td>
                            </tr>
                            <tr>
                                <th scope="row">ID Usuario: </th>
                                <td><?php echo $_SESSION['usuario']->getIdPartidas() ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="./desconectar.php">
                        <button class="btn btn-danger w-100">Cerrar Sesion</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TIENDA -->
    <div class="modal fade" id="tiendaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tiendaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">COMERCIANTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="contenidoTiendaModal" class="modal-body">
                    <p>Contenido de la tienda</p>
                    <p>ITEM TIENDA 1</p>
                    <p>ITEM TIENDA 2</p>
                    <p>ITEM TIENDA 3</p>
                    <p>ITEM TIENDA 4</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ESTADISTICAS -->
    <div class="modal fade" id="statsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ESTADISTICAS PERSONAJE</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <h4>Puntos de habilidad restantes: <span id="puntosStatRestante">0</span></h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="row mb-5">
                                    <div class="col-md-2 justify-content-center justify-content-center">
                                        <img src="./img/BotonesNav/BotonMas.png" alt="Subir habilidad" id="botonMejoraStat" class="img-thumbnail w-75">
                                    </div>
                                    <div class="col-md-4">
                                        <h2 class="h2 text-decoration-underline text-justify">FUERZA</h2>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="text-justify text-wrap">Mejorar este atributo hará que tu personaje haga mas daño por golpe a tu enemigo. El aumento sera porcentual. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="row mb-5">
                                    <div class="col-md-2 justify-content-center">
                                        <img src="./img/BotonesNav/BotonMas.png" alt="Subir habilidad" id="botonMejoraStat" class="img-thumbnail w-75">
                                    </div>
                                    <div class="col-md-4 justify-content-center">
                                        <h2 class="h2 text-decoration-underline text-justify">DESTREZA</h2>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="text-justify text-wrap"> Mejorar este atributo hará que tu personaje tenga mayor probabilidad de dañar dos veces al enemigo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-md-2 justify-content-center">
                                        <img src="./img/BotonesNav/BotonMas.png" alt="Subir habilidad" id="botonMejoraStat" class="img-thumbnail w-75">
                                    </div>
                                    <div class="col-md-4 justify-content-center">
                                        <h2 class="h2 text-decoration-underline text-justify">CARISMA</h2>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="text-justify text-wrap"> Mejorar este atributo hará que obtengas mejores ofertas en la tienda. Mejores precios y mejores objetos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL INVENTARIO -->
    <div class="modal fade" id="inventarioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">INVENTARIO / MOCHILA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Objetos del usuario</p>
                </div>
            </div>
        </div>
    </div>
<?php
                    } else {
                        echo '<h5 class="text-center"> La partida a la que '
                            . 'intentas entrar no existe. Inicia sesion y '
                            . 'crea una partida</h5>';
?>
    <a href="./accesoUsuario.php">
        <button class="btn btn-secondary w-100 mt-3">Volver atras</button>
    </a>
<?php
                    }
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/ajustes.js"></script>
<script src="./js/tropas.js"></script>
<script src="./js/enemigos.js"></script>

</body>

</html>