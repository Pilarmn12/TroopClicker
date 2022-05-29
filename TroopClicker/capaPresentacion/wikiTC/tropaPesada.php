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
                <h2 class="text-decoration-underline pb-3"><img src="./img/tochLit.png" alt=""> Tropas - Pesadas <img src="./img/tochLit2.png" alt=""></h2>
                <p class="lead">
                    Son las maquina de asedio que se encargaran de demoler las estructuras del enemigo. 
                    Existen tropas de ataque y de defensa.
                </p>
                <hr>
                <h4 class="my-4 fw-bold">Tropas Pesadas:</h4>
                <h5 class="text-decoration-underline">Catapultas: </h5>
                <p class="mb-3">Esta tropa se encarga de demoler estructuras, o atacar a grandes grupos 
                    situados en un punto fijo. <br> Lanzan piedras grandes envueltas en fuego. </p>
                <hr>
                <h4 class="fw-bold my-4">Proximamente...</h4>
                <p class="mb-5">
                    Seguiremos añdiendo contenido y funcionalidades a las tropas existentes. Y tambien
                    planeamos añadir mas tropas pesadas en el futuro.
                </p>

                <nav aria-label="Paginacion">
                    <ul class="pagination justify-content-center fixed-bottom mt-5">
                        <li class="page-item">
                            <a class="page-link" href="./tropaDistancia.php" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="./tropaDistancia.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="./tropaPesada.php">2</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled" disabled>
                            <a class="page-link" href="./tropaPesada.php">Siguiente</a>
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