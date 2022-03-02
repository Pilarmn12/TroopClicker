
<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="./index.php">
                <img src="./img/Logo.png" alt="">&nbsp;&nbsp; Troop Clicker
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls=
                "navbarSupportedContent" aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    ';

if (isset($_SESSION['usuario'])) {
    echo '      <li class="nav-item">
                    <a class="nav-link active" href="./areaUsuario.php">Area Usuario</a></li>
                <li class="nav-item">
                   <a class="nav-link" href="./indexJuego.php">Jugar</a></li>
                <li class="nav-item">
                   <a class="nav-link" href="./gestionUsuario.php">Ajustes Usuario</a></li>
                <li class="nav-item">
                   <a class="nav-link" href="./gestionPartida.php">Gestion Partida</a></li>
                <li class="nav-item">
                   <a class="nav-link" href="./desconectar.php">Desconectar</a></li>
           ' . '<li class="nav-item"> <a class="nav-link active"> Usuario: ' . $_SESSION['usuario']->getNombre() . '</a> </li>  </ul>
        </div> 
    </div>
</nav>';

} else {
    echo '      <li class="nav-item">
                    <a class="nav-link active" href="./index.php">Inicio</a></li>
                <li class="nav-item">
                   <a class="nav-link" href="./accesoUsuario.php">Inicio de Sesion / Registro</a></li>
            </ul>
        </div>
    </div>
</nav>';
}
