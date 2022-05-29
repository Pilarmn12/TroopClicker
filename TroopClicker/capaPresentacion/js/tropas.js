/** VARIABLES  */
let monedasTotal = 0;
let monedasPorSegundo = 0;
let cantidad = 1;

let mejoraDañoPrecio = 15
let mejorasDaño = 0;

let precioExponencial;
let precioFinal;

/** EVENTOS */

$(document).ready(function () {
    let monedasTotal = $('#monedasTotal').text();
    let mejorasDaño = $('#dañoHeroe').text();


    /*
     ---------- Objeto - Tropa ----------
     */

    function Tropa(precio, cantidadT) {
        //Propiedades
        this.precio = precio;
        this.cantidadT = cantidadT;

        Object.defineProperty(this, 'precio', {
            get: function () {
                return precio;
            },
            set: function (value) {
                precio = value;
            }
        });

        Object.defineProperty(this, 'cantidadT', {
            get: function () {
                return cantidadT;
            },
            set: function (value) {
                cantidadT = value;
            }
        });
    }

    /** CREAR OBJETOS TROPAS */
    let trampa = new Tropa(20, parseInt($('#cantidadTrampas').text()));
    let campesino = new Tropa(100, parseInt($('#cantidadCampesino').text()));
    let garrote = new Tropa(350, parseInt($('#cantidadGarrote').text()));
    let espadaCorta = new Tropa(800, parseInt($('#cantidadEspadaCorta').text()));
    let escudero = new Tropa(1500, parseInt($('#cantidadEscudero').text()));
    let lancero = new Tropa(2000, parseInt($('#cantidadLancero').text()));
    let hacha = new Tropa(3000, parseInt($('#cantidadHacha').text()));
    let caballero = new Tropa(5000, parseInt($('#cantidadCaballero').text()));
    let hondero = new Tropa(1000, parseInt($('#cantidadHondero').text()));
    let arquero = new Tropa(5000, parseInt($('#cantidadArquero').text()));
    let ballestero = new Tropa(10000, parseInt($('#cantidadBallestero').text()));
    let sacerdote = new Tropa(15000, parseInt($('#cantidadSacerdote').text()));
    let mago = new Tropa(30000, parseInt($('#cantidadMago').text()));
    let catapulta = new Tropa(50000, parseInt($('#cantidadCatapulta').text()));

    /** Desbloqueo de tropas incial al cargar los datos */
    DesbloquearTropas(campesino.cantidadT, "comprarGarrote");
    DesbloquearTropas(campesino.cantidadT, "comprarHondero");
    DesbloquearTropas(garrote.cantidadT, "comprarEspadaCorta");
    DesbloquearTropas(espadaCorta.cantidadT, "comprarEscudero");
    DesbloquearTropas(escudero.cantidadT, "comprarLancero");
    DesbloquearTropas(lancero.cantidadT, "comprarHacha");
    DesbloquearTropas(hacha.cantidadT, "comprarCaballero");
    DesbloquearTropas(caballero.cantidadT, "comprarSacerdote");
    DesbloquearTropas(hondero.cantidadT, "comprarArquero");
    DesbloquearTropas(arquero.cantidadT, "comprarBallestero");
    DesbloquearTropas(ballestero.cantidadT, "comprarSacerdote");
    DesbloquearTropas(sacerdote.cantidadT, "comprarMago");
    DesbloquearTropas(mago.cantidadT, "comprarCatapulta");

    /** Calcular cantidad de monedas por segundo */
    MonedasPorSegundo();

    /** AUTOCLICK */
    setInterval(GolpePorSegundo, 1000);

    /** FUNCIONES */

    function GolpePorSegundo() {
        monedasTotal += monedasPorSegundo;
        $('#monedasTotal').text(monedasTotal);
    }

    /** Daño por golpe al enemigo */
    $('#fotoEnemigo').click(function () {
        monedasTotal += cantidad;
        $('#monedasTotal').text(monedasTotal);
    });

    /** Boton monedas admin - Ganas 50000 monedas al pulsar */
    $('#monedasAdmin').click(function () {
        monedasTotal += 50000;
        $('#monedasTotal').text(monedasTotal);
    });

    /** Funcion calcular monedas por segundo */
    function MonedasPorSegundo() {
        monedasPorSegundo += trampa.cantidadT;
        monedasPorSegundo += calcularDañoExponencial(campesino.cantidadT, 5);
        monedasPorSegundo += calcularDañoExponencial(garrote.cantidadT, 10);
        monedasPorSegundo += calcularDañoExponencial(espadaCorta.cantidadT, 20);
        monedasPorSegundo += calcularDañoExponencial(escudero.cantidadT, 40);
        monedasPorSegundo += calcularDañoExponencial(lancero.cantidadT, 60);
        monedasPorSegundo += calcularDañoExponencial(hacha.cantidadT, 80);
        monedasPorSegundo += calcularDañoExponencial(caballero.cantidadT, 100);
        monedasPorSegundo += calcularDañoExponencial(hondero.cantidadT, 30);
        monedasPorSegundo += calcularDañoExponencial(arquero.cantidadT, 60);
        monedasPorSegundo += calcularDañoExponencial(ballestero.cantidadT, 120);
        monedasPorSegundo += calcularDañoExponencial(sacerdote.cantidadT, 200);
        monedasPorSegundo += calcularDañoExponencial(mago.cantidadT, 500);
        monedasPorSegundo += calcularDañoExponencial(catapulta.cantidadT, 1000);

        $('#monedasPorSegundo').text(monedasPorSegundo);
    }
    /** Comprar mejora de daño, precio, cantidad y mejora de daño. */
    $('#mejoraDaño').click(function () {
        if (mejorasDaño == 0) {
            if (monedasTotal >= mejoraDañoPrecio) {
                monedasTotal -= mejoraDañoPrecio;
                mejorasDaño++;
                cantidad = 2;
                mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 1.5);
            }
        } else if (mejorasDaño >= 1) {
            if (monedasTotal >= mejoraDañoPrecio) {
                monedasTotal -= mejoraDañoPrecio;
                mejorasDaño++;
                cantidad = cantidad + 2;
                mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 1.7);
            }
        } else if (mejorasDaño >= 25) {
            if (monedasTotal >= mejoraDañoPrecio) {
                monedasTotal -= mejoraDañoPrecio;
                mejorasDaño++;
                cantidad = cantidad + 5;
                mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 2.3);
            }
        } else if (mejorasDaño >= 100) {
            if (monedasTotal >= mejoraDañoPrecio) {
                monedasTotal -= mejoraDañoPrecio;
                mejorasDaño++;
                cantidad = cantidad + 10;
                mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 3);
            }
        }
        $('#monedasTotal').text(monedasTotal);
        $('#precioMejoraDaño').text(mejoraDañoPrecio);
        $('#dañoHeroe').text(mejorasDaño);
    });
    /** Comprar Trampa y calcular precio */
    $('#comprarTrampa').click(function () {
        if (monedasTotal >= trampa.precio) {
            monedasTotal -= trampa.precio;
            trampa.cantidadT++;
            precioFinal = calcularPrecioExponencial(trampa.cantidadT);
            trampa.precio = Math.round(trampa.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioTrampa').text(trampa.precio);
            $('#cantidadTrampas').text(trampa.cantidadT);

            MonedasPorSegundo();
        }
    });
    /** Comprar Campesino y calcular precio */
    $('#comprarCampesino').click(function () {
        if (monedasTotal >= campesino.precio) {
            monedasTotal -= campesino.precio;
            campesino.cantidadT++;
            precioFinal = calcularPrecioExponencial(campesino.cantidadT);
            campesino.precio = Math.round(campesino.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioCampesino').text(campesino.precio);
            $('#cantidadCampesino').text(campesino.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(campesino.cantidadT, "comprarGarrote");
            DesbloquearTropas(campesino.cantidadT, "comprarHondero");
        }
    });
    /** Comprar Garrote y calcular precio */
    $('#comprarGarrote').click(function () {
        if (monedasTotal >= garrote.precio) {
            monedasTotal -= garrote.precio;
            garrote.cantidadT++;
            precioFinal = calcularPrecioExponencial(garrote.cantidadT);
            garrote.precio = Math.round(garrote.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioGarrote').text(garrote.precio);
            $('#cantidadGarrote').text(garrote.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(garrote.cantidadT, "comprarEspadaCorta");
        }
    });
    /** Comprar Soldado de espada corta y calcular precio */
    $('#comprarEspadaCorta').click(function () {
        if (monedasTotal >= espadaCorta.precio) {
            monedasTotal -= espadaCorta.precio;
            espadaCorta.cantidadT++;
            precioFinal = calcularPrecioExponencial(espadaCorta.cantidadT);
            espadaCorta.precio = Math.round(espadaCorta.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioEspadaCorta').text(espadaCorta.precio);
            $('#cantidadEspadaCorta').text(espadaCorta.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(espadaCorta.cantidadT, "comprarEscudero");
        }
    });
    /** Comprar Escudero y calcular precio */
    $('#comprarEscudero').click(function () {
        if (monedasTotal >= escudero.precio) {
            monedasTotal -= escudero.precio;
            escudero.cantidadT++;
            precioFinal = calcularPrecioExponencial(escudero.cantidadT);
            escudero.precio = Math.round(escudero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioEscudero').text(escudero.precio);
            $('#cantidadEscudero').text(escudero.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(escudero.cantidadT, "comprarLancero");
        }
    });
    /** Comprar Lancero y calcular precio */
    $('#comprarLancero').click(function () {
        if (monedasTotal >= lancero.precio) {
            monedasTotal -= lancero.precio;
            lancero.cantidadT++;
            precioFinal = calcularPrecioExponencial(lancero.cantidadT);
            lancero.precio = Math.round(lancero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioLancero').text(lancero.precio);
            $('#cantidadLancero').text(lancero.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(lancero.cantidadT, "comprarHacha");
        }
    });
    /** Comprar Hacha y calcular precio */
    $('#comprarHacha').click(function () {
        if (monedasTotal >= hacha.precio) {
            monedasTotal -= hacha.precio;
            hacha.cantidadT++;
            precioFinal = calcularPrecioExponencial(hacha.cantidadT);
            hacha.precio = Math.round(hacha.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioHacha').text(hacha.precio);
            $('#cantidadHacha').text(hacha.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(hacha.cantidadT, "comprarCaballero");
        }
    });
    /** Comprar Caballero y calcular precio */
    $('#comprarCaballero').click(function () {
        if (monedasTotal >= caballero.precio) {
            monedasTotal -= caballero.precio;
            caballero.cantidadT++;
            precioFinal = calcularPrecioExponencial(caballero.cantidadT);
            caballero.precio = Math.round(caballero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioCaballero').text(caballero.precio);
            $('#cantidadCaballero').text(caballero.cantidadT);

            MonedasPorSegundo();
            if (ballestero.cantidadT >= 10) {
                DesbloquearTropas(caballero.cantidadT, "comprarSacerdote");
            }
        }
    });
    /** Comprar Hondero y calcular precio */
    $('#comprarHondero').click(function () {
        if (monedasTotal >= hondero.precio) {
            monedasTotal -= hondero.precio;
            hondero.cantidadT++;
            precioFinal = calcularPrecioExponencial(hondero.cantidadT);
            hondero.precio = Math.round(hondero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioHondero').text(hondero.precio);
            $('#cantidadHondero').text(hondero.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(hondero.cantidadT, "comprarArquero");
        }
    });
    /** Comprar Arquero y calcular precio */
    $('#comprarArquero').click(function () {
        if (monedasTotal >= arquero.precio) {
            monedasTotal -= arquero.precio;
            arquero.cantidadT++;
            precioFinal = calcularPrecioExponencial(arquero.cantidadT);
            arquero.precio = Math.round(arquero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioArquero').text(arquero.precio);
            $('#cantidadArquero').text(arquero.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(arquero.cantidadT, "comprarBallestero");
        }
    });
    /** Comprar Ballestero y calcular precio */
    $('#comprarBallestero').click(function () {
        if (monedasTotal >= ballestero.precio) {
            monedasTotal -= ballestero.precio;
            ballestero.cantidadT++;
            precioFinal = calcularPrecioExponencial(ballestero.cantidadT);
            ballestero.precio = Math.round(ballestero.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioBallestero').text(ballestero.precio);
            $('#cantidadBallestero').text(ballestero.cantidadT);

            MonedasPorSegundo();

            if (caballero.cantidadT >= 10) {
                DesbloquearTropas(ballestero.cantidadT, "comprarSacerdote");
            }
        }
    });
    /** Comprar Sacerdote y calcular precio */
    $('#comprarSacerdote').click(function () {
        if (monedasTotal >= sacerdote.precio) {
            monedasTotal -= sacerdote.precio;
            sacerdote.cantidadT++;
            precioFinal = calcularPrecioExponencial(sacerdote.cantidadT);
            sacerdote.precio = Math.round(sacerdote.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioSacerdote').text(sacerdote.precio);
            $('#cantidadSacerdote').text(sacerdote.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(sacerdote.cantidadT, "comprarMago");
        }
    });
    /** Comprar Mago y calcular precio */
    $('#comprarMago').click(function () {
        if (monedasTotal >= mago.precio) {
            monedasTotal -= mago.precio;
            mago.cantidadT++;
            precioFinal = calcularPrecioExponencial(mago.cantidadT);
            mago.precio = Math.round(mago.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioMago').text(mago.precio);
            $('#cantidadMago').text(mago.cantidadT);

            MonedasPorSegundo();
            DesbloquearTropas(mago.cantidadT, "comprarCatapulta");
        }
    });
    /** Comprar Catapulta y calcular precio */
    $('#comprarCatapulta').click(function () {
        if (monedasTotal >= catapulta.precio) {
            monedasTotal -= catapulta.precio;
            catapulta.cantidadT++;
            precioFinal = calcularPrecioExponencial(catapulta.cantidadT);
            catapulta.precio = Math.round(catapulta.precio * precioFinal);

            $('#monedasTotal').text(monedasTotal);
            $('#precioCatapulta').text(catapulta.precio);
            $('#cantidadCatapulta').text(catapulta.cantidadT);

            MonedasPorSegundo();
        }
    });

    /** Calcula daño exponencial */
    function calcularDañoExponencial(cantidad, dañoTropa) {

        if (cantidad == 0) {
            dañoExponencial = 0;
        } else if (cantidad <= 5) {
            dañoExponencial = dañoTropa;
        } else if (cantidad <= 10) {
            dañoExponencial = dañoTropa * 2;
        } else if (cantidad <= 30) {
            dañoExponencial = dañoTropa * 4;
        } else if (cantidad <= 50) {
            dañoExponencial = dañoTropa * 6;
        } else if (cantidad <= 75) {
            dañoExponencial = dañoTropa * 8;
        } else if (cantidad <= 100) {
            dañoExponencial = dañoTropa * 10;
        }
        return dañoExponencial;
    }

    /** Calcula precio exponencial */
    function calcularPrecioExponencial(cantidad) {

        if (cantidad <= 5) {
            precioExponencial = 2;
        } else if (cantidad <= 15) {
            precioExponencial = 1.3;
        } else if (cantidad <= 30) {
            precioExponencial = 1.5;
        } else if (cantidad <= 50) {
            precioExponencial = 1.7;
        } else if (cantidad <= 100) {
            precioExponencial = 2;
        }
        return precioExponencial;
    }

    /** Funcion para desbloquear tropas de una categoria superior */
    function DesbloquearTropas(tropa, tropaDesbloquear) {
        if (tropa >= 10) {
            document.getElementById(tropaDesbloquear).disabled = false;
        }
    }

    /** GUARDADO DE PARTIDA */
    $('#saveGame').click(function () {
        let nivelPersonaje = $('#nivelPersonaje').text();
        let valorExp = $('#valorExp').text();
        let alias = $('#alias').text();
        let fuerzaStats = '0';
        let destrezaStats = '0';
        let carismaStats = '0';
        
        let body = {
            cantDanio: mejorasDaño,
            cantTrampas: trampa.cantidadT,
            cantCampesinos: campesino.cantidadT,
            cantGarroteros: garrote.cantidadT,
            cantEspadasCortas: espadaCorta.cantidadT,
            cantEscuderos: escudero.cantidadT,
            cantLanceros: lancero.cantidadT,
            cantHachas: hacha.cantidadT,
            cantCaballeros: caballero.cantidadT,
            cantHonderos: hondero.cantidadT,
            cantArqueros: arquero.cantidadT,
            cantBallesteros: ballestero.cantidadT,
            cantSacerdotes: sacerdote.cantidadT,
            cantMagos: mago.cantidadT,
            cantCatapultas: catapulta.cantidadT,
            alias: alias,
            nivel: nivelPersonaje,
            exp: valorExp,
            monedas: monedasTotal,
            fuerza: fuerzaStats,
            destreza: destrezaStats,
            carisma: carismaStats
        }

        $.ajax({
            type: "POST",
            url: 'guardarPartida.php',
            data: body,
            success: function () {
                $('#guardadoCompleto').fadeIn();
                setTimeout(function () {
                    $("#guardadoCompleto").fadeOut();
                }, 5000);
            },
            error: function () {
                $('#errorGuardado').fadeIn();
                setTimeout(function () {
                    $("#errorGuardado").fadeOut();
                }, 5000);
            }
        });

        return false;
    })
});