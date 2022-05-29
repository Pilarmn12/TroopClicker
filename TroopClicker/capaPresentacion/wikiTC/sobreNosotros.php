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
    <link rel="stylesheet" href="./css/formSolicitud.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include '../inc/navbarWiki.php';
            ?>

            <div class="cuerpoWeb col">
                <h2 class="text-decoration-underline pb-3"><img src="./img/tochLit.png" alt="">Sobre Nosotros... <img src="./img/tochLit2.png" alt=""></h2>
                <p class="lead">
                    Realmente no hay un nosotros (de momento)... <br><br>
                    Mi nombre es Pilar Martinez y actualmente soy la unica desarrolladora de este proyecto,
                    me encarge tanto del diseño de arte e interfaz, como de la programacion al nivel front y back end. <br><br>
                    Aunque espero que eso cambie dentro de poco
                </p>
                <hr>
                <h4 class="my-4 fw-bold">Actualmente busco un equipo de desarrollo</h4>
                <p>Para poder avanzar el desarrollo a un mejor ritmo y solucionar muchos de los errores
                    que han aparecido necesito un equipo, que tranbajen en front y backend
                </p>
                <hr>
                <h4 class="my-4">¿Crees que podrias ser tú?</h4>
                <p class="mb-5">Si la respuesta es que si, rellena el formulario de mas abajo para enviar
                    tus datos y me pondre en contacto tan pronto como pueda.</p>

                <div class="justify-content-center mb-5" style="text-align:center">
                    <button type="button" class="btn btn-lg btn-primary w-50" data-bs-toggle="modal" data-bs-target="#formSolicitud" data-toggle="tooltip" data-placement="bottom" title="Mochila del personaje">Formulario</button>
                </div>
                <!-- MODAL INVENTARIO -->
                <div class="modal fade" id="formSolicitud" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="color: black;">
                            <div class="modal-header">
                                <p class="blue-text">Responde a estas preguntas para enviar la solicitud</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <h4 class="text-center mb-4 fw-bold text-decoration-underline">Formulario de Solicitud de empleo</h4>
                                    <form class="form-card" onsubmit="event.preventDefault()">
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Nombre <span class="text-danger"> *</span></label>
                                                <input type="text" id="fname" name="fname" placeholder="Introduce tu nombre" maxlength="30">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Apellidos <span class="text-danger"> *</span></label>
                                                <input type="text" id="lname" name="lname" placeholder="Introduce tu apellido" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Email <span class="text-danger"> *</span></label>
                                                <input type="text" id="email" name="email" placeholder="Correo electronico" maxlength="80">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Telefono <span class="text-danger"> *</span></label>
                                                <input type="text" id="tlf" name="tlf" placeholder="Nº de telefono">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Nacimiento <span class="text-danger"> *</span></label>
                                                <input type="date" id="fecha" name="fecha" placeholder="Fecha de nacimiento">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Localidad <span class="text-danger"> *</span></label>
                                                <input type="text" id="localidad" name="localidad" placeholder="Lugar de residencia">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Formacion Academica <span class="text-danger"> *</span></label>
                                                <input type="text" id="formacion" name="formacion" placeholder="Carrera, CFGS, CFGM....">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3 pt-2">Experiencia en el sector</label>
                                                <select name="experiencia" id="experiencia" class="form-select">
                                                    <option selected value="0">Sin experiencia</option>
                                                    <option value="1">1 año</option>
                                                    <option value="2-3">2-3 años</option>
                                                    <option value="4-5">4-5 años</option>
                                                    <option value="6-10">6-10 años</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3 pt-2">Lugar preferido de trabajo</label>
                                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-select">
                                                    <option selected value="0">Teletrabajo</option>
                                                    <option value="1">Oficina</option>
                                                    <option value="2-3">Mixto</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3 pt-2">Datos Relevantes</label>
                                                <textarea cols="80" rows="3" name="datosInteres" id="datosInteres" placeholder="¿Algun dato importante que deba conocer?"></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <div class="form-check pt-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                       &nbsp; Aceptar los terminos y condiciones
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-12">
                                                <button type="reset" id="reset" class="btn-block btn-danger">REINICIAR</button>
                                                <button type="submit" id="submit" class="btn-block btn-primary">ENVIAR SOLICITUD</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Paginacion">
                    <ul class="pagination justify-content-center fixed-bottom mt-5">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="./index.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="./personaje.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="./sobreNosotros.php">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="./personaje.php">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/87a5be1304.js" crossorigin="anonymous"></script>
    <script src="./js/wiki.js"></script>
    <script src="./js/formSolicitud.js"></script>
</body>

</html>