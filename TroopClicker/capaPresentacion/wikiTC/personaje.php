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
                    <h2 class="text-decoration-underline pb-3"><img src="./img/tochLit.png" alt=""> Personaje <img src="./img/tochLit2.png" alt=""></h2>
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 col-sm-6 col-md-8">
                            <p class="fs-5">
                                Nuestro personaje o heroe, lo principal es recordar que actualmente no estan
                                implementadas las funcionalidades y mecanicas de nuestro heroe. <br><br>
                                El objetivo de nuestro personaje sera disponer de un gran ejercito para
                                enfrentarse a todos los enemigos del juego, tanto los que existen,
                                como los que estan por venir...<br><br>
                                Asique lo basico que nuestro personaje tiene actualmente es:
                            </p>
                            <ul class="list-group list-group-flush rounded w-50">
                                <li class="list-group-item">Nombre y nivel personal</li>
                            </ul>
                        </div>
                        <div class="col-4 d-none d-sm-inline">
                            <img id="heroeRotar" src="./img/heroInv.gif" alt="Heroe">
                        </div>
                    </div>

                    <br>
                    <hr>
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 col-sm-none col-md-6">
                            <h4 class="fs-3 my-4 text-decoration-underline">¿Proximas actualizaciones?</h4>
                            <p class="fs-5">¡Si! Proximamente iremos añadiendo contenido para personajes.
                                <br><br>
                                Queremos convertir nuestro personaje en un autentico <strong>Adalid</strong>,
                                para que puedas mejorarlo igual que si esto fuera un videojuego RPG.
                                <br><br>
                                Bueno... tal vez tanto como D&D no, pero lo vamos a intentar vale?! <br><br>
                                Para poder conseguir esto planeamos añadir estos contenidos:
                            </p>
                            <div class="row d-flex justify-content-center mt-2 mb-5">
                                <ul class="list-group list-group-flush rounded w-100">
                                    <li class="list-group-item">Sistema de Estadisticas <i class="small text-muted">(Cuando
                                            se implemente añadiremos una guia)</i></li>
                                    <li class="list-group-item">Desarrollo de la tienda e inventario <i
                                            class="small text-muted">(Actualmente en desuso)</i></li>
                                    <li class="list-group-item">Nombre y nivel personal</li>
                                    <li class="list-group-item">Nombre y nivel personal</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 d-none d-sm-inline mb-5">
                            <embed src="./mult/hojaPersonaje.pdf" type="application/pdf" width="100%" height="100%" />
                        </div>
                    </div>
                    <nav aria-label="Paginacion">
                        <ul class="pagination justify-content-center fixed-bottom">
                            <li class="page-item">
                                <a class="page-link" href="./index.php" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="./index.php">1</a></li>
                            <li class="page-item"><a class="page-link active" href="./personaje.php">2</a></li>
                            <li class="page-item"><a class="page-link" href="./tropaInfanteria.php">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="./tropaInfanteria.php">Siguiente</a>
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