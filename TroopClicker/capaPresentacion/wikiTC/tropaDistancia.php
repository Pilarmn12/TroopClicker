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
                <h2 class="text-decoration-underline pb-3"><img src="./img/tochLit.png" alt=""> Tropas - Distancia <img src="./img/tochLit2.png" alt=""></h2>
                <p class="lead">
                    Tropas destinadas a estar en la retaguardia, para estar lo mas a salvo 
                    posible dentro de la batalla. Ya que con su estilo de combate no podrian 
                    aguantar al frente.
                </p>
                <hr>
                <h4 class="my-4 fw-bold">Tropas a distancia:</h4>
                <h5 class="text-decoration-underline">Honderos: </h5>
                <p class="mb-3">Campesinos entrenados para el combate con honda.
                    La precision no es su fuerte, pero su potencia es letal.</p>
                <h5 class="text-decoration-underline">Arqueros: </h5>
                <p class="mb-3">Estos soldados usan armadura tachonada. Su arma principal es
                    el arco, de modo que destacan por su precision, como arma secundaria
                    disponen de una daga para defenderse cuerpo a cuerpo en caso de ser necesario</p>
                <h5 class="text-decoration-underline">Ballesteros: </h5>
                <p class="mb-3">Esta tropa esta formada por soldados de la burgesia,
                    usan armadura tachonada y su arma principal es la ballesta. </p>
                <hr>
                <h4 class="fw-bold my-4">Proximamente...</h4>
                <p class="mb-5">
                    Seguiremos añdiendo contenido y funcionalidades a las tropas existentes. Y tambien
                    planeamos añadir mas tropas a distancia en el futuro.
                </p>

                <nav aria-label="Paginacion">
                    <ul class="pagination justify-content-center fixed-bottom mt-5">
                        <li class="page-item">
                            <a class="page-link" href="./tropaInfanteria.php" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="./tropaInfanteria.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="./tropaDistancia.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="./tropaMagica.php">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="./tropaMagica.php">Siguiente</a>
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