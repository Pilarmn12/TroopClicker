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
                <h2 class="text-decoration-underline pb-3"><img src="./img/tochLit.png" alt=""> Tropas - Infanteria <img src="./img/tochLit2.png" alt=""></h2>
                <p class="lead">
                    La mayor parte de las tropas actualmente son las de infanteria, es decir,
                    los soldados a pie caracterizados por formar la primera linea utilizando
                    armas cuerpo a cuerpo.
                </p>
                <hr>
                <h4 class="my-4 fw-bold">Tropas de infanteria:</h4>
                <h5 class="text-decoration-underline">Campesino: </h5>
                <p class="mb-3"> Estos abuelitos han salido de sus casas con las
                    horcas y antorchas para ayudarte en tus batallas.</p>
                <h5 class="text-decoration-underline">Señor con Garrote: </h5>
                <p class="mb-3">Estos hombres no usan mas armadura que su ropa de tela,
                    y como arma usan un garrote de madera.</p>
                <h5 class="text-decoration-underline">Soldado con Espada Corta: </h5>
                <p class="mb-3">Son los soldados mas novatos, que empiezan a iniciarse en
                    la milicia. Su arma principal es una simple espada corta y sin escudo.
                    Usan armadura ligera</p>
                <h5 class="text-decoration-underline">Escuderos: </h5>
                <p class="mb-3">Estos soldados usan armadura de peso medio y como arma usan una
                    lanza y un escudo de cuerpo completo para protegerse y hacer formaciones.</p>
                <h5 class="text-decoration-underline">Lanceros: </h5>
                <p class="mb-3">Estos soldados usan armadura de peso bajo para tener una alta movilidad
                    y como arma usan una lanza sin escudo. Estas tropas en grupos grandes son muy peligrosas</p>
                <h5 class="text-decoration-underline">Soldados con hacha: </h5>
                <p class="mb-3">Estos soladados usan armadura pesada y como arma un hacha de dos manos.
                    Lo cual los hace muy lentos pero muy peligrosos si aciertan el golpe</p>
                <h5 class="text-decoration-underline">Caballeros: </h5>
                <p class="mb-3">Estas tropas usan armadura pesada. Sus armas son una
                    espada de una mano junto a un escudo ligero</p>
                <hr>
                <h4 class="fw-bold my-4">Proximamente...</h4>
                <p class="mb-5">
                    Seguiremos añdiendo contenido y funcionalidades a las tropas existentes. Y tambien
                    planeamos añadir mas tropas de infanteria en el futuro
                </p>

                <nav aria-label="Paginacion">
                    <ul class="pagination justify-content-center fixed-bottom mt-5">
                        <li class="page-item">
                            <a class="page-link" href="./personaje.php" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="./personaje.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="./tropaInfanteria.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="./tropaDistancia.php">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="./tropaDistancia.php">Siguiente</a>
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