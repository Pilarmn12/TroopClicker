<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guia Oficial TC</title>
        <link rel="icon" href="./img/Logo.png" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/wiki.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <?php
                include '../inc/navbarWiki.php';
                ?>

                <div class="cuerpoWeb col">
                    <h1 class="text-decoration-underline pb-3">Introducción</h1>
                    <p class="lead">
                        Bienvenidos a la Guia Oficial / Manual de Troop Clicker. <br><br>
                        <i>Aqui explicaremos todos los conceptos, mecanicas del juego y su contenido.</i>
                    </p>
                    <img src="./img/banner.png" alt="Banner Troop Clicker" class="img-fluid rounded"><br>
                    <br>
                    <hr>
                    <h4 class="my-4">¿Qué es este juego?</h4>
                    <p>Es un videojuego incremental, consiste en que por medio
                        de hacer clics sobre el enemigo iras consiguiendo monedas
                        como recompensa, y con ellas podrás mejorar tu héroe,
                        comprar más tropas o mejoras para ellas.
                        <br><br>
                        A parte de eso también podrás comprar objetos en la
                        tienda para poder usarlos<strong> (Esta funcionalidad
                            será añadida en próximas actualizaciones)</strong>
                    </p>
                    <hr>
                    <h4 class="my-4">¿Cuál es el objetivo?</h4>
                    <p class="mb-5">El objetivo principal es poder conseguir todos los logros,
                        y para ello tendrás que golpear muchas veces al enemigo,
                        pero recuerda si se rompe tu ratón nosotros no tenemos
                        la culpa. <br><br> A parte de los logros también
                        planeamos añadir el <strong>Nivel de Renombre
                        </strong> (Mas adelante explicaremos como funcionara)</p>


                    <nav aria-label="Paginacion">
                        <ul class="pagination justify-content-center fixed-bottom mt-5">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="./index.php">1</a></li>
                            <li class="page-item"><a class="page-link" href="./personaje.php">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="./personaje.php">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/87a5be1304.js" crossorigin="anonymous"></script>
        <script src="./js/wiki.js"></script>
    </body>

</html>