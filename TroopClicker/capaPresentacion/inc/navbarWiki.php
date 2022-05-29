
<?php echo'
    <div id="menuLateral" class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 border bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="./capaPresentacion/index.php" class="w-100 d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <img src="./img/Logo.png" alt="Logo Troop Clicker">
                        <span id="titLogo" class="fs-5 d-none d-sm-inline align-self-center">Troop Clicker</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <span class="fondoLogo"> <img src="./img/iconos/introduccion.png" 
                                alt="Introduccion" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Introduccion</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="personaje.php" class="nav-link align-middle px-0">
                                <span class="fondoLogo"> <img src="./img/iconos/heroe.png" 
                                alt="Personaje" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Personaje</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <span class="fondoLogo"> <img src="./img/iconos/tropas.png"
                                alt="Tropas" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Tropas</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="tropaInfanteria.php" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; Infanteria </span></a>
                                </li>
                                <li>
                                    <a href="tropaDistancia.php" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp;
                                            Distiancia</span></a>
                                </li>
                                <li>
                                    <a href="tropaMagica.php" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp;
                                            Magicas</span></a>
                                </li>
                                <li>
                                    <a href="tropaPesada.php" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp;
                                            Pesadas</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link disabled align-middle px-0">
                                <span class="fondoLogo"> <img src="./img/iconos/enemigos.png" 
                                alt="Enemigos" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Enemigos</span>
                            </a>
                        </li>

                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link disabled px-0 align-middle">
                                <span class="fondoLogo"> <img src="./img/iconos/mejoras.png" 
                                alt="Mejoras" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Mejoras</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; Tier
                                            1</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; Tier
                                            2</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; Tier
                                            3</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link disabled align-middle px-0">
                                <span class="fondoLogo"> <img src="./img/iconos/logros.png" 
                                alt="Logros" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Logros</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link disabled px-0 align-middle">
                                <span class="fondoLogo"> <img src="./img/iconos/menu.png" 
                                alt="Menu del Personaje" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Menu de Accion</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp;
                                            Tienda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"
                                            aria-disabled="true">&nbsp; Mochila</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"
                                            aria-disabled="true">&nbsp; Estadisticas</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="sobreNosotros.php" class="nav-link px-0 align-middle">
                                <span class="fondoLogo"> <img src="./img/iconos/nosotros.png" 
                                alt="Sobre nosotros" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Sobre nosotros</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link disabled px-0 align-middle">
                                <span class="fondoLogo"> <img src="./img/iconos/desarrollo.png"
                                        alt="Desarrollo del juego" style="width: 30px"></span>
                                <span class="ms-1 d-none d-sm-inline">&nbsp; Desarrollo</span>
                            </a>
                        </li>
                    </ul>

                    <button class="cambioModoOscuro mb-3 d-sm-flex d-none" id="btnModo">
                        <span><i class="fa fa-sun-o"></i></span>
                        <span><i class="fa fa-moon-o"></i></span>
                    </button>
                    <button id="btnSub" class="btn btn-warning w-100 mb-3 d-none d-sm-inline">¡Subscribete!</button>

                </div>
            </div>
'; ?>
