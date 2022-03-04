/** VARIABLES / ATRIBUTOS */

let monedasTotal = 0, monedasPorSegundo = 0;
let cantidad = 1;

let mejoraDañoPrecio = 15
let mejorasDaño = 0;

let precioExponencial;
let precioFinal;


/** EVENTOS */

var jsVar = "<?php print_r($_SESSION['partida']);?>";
console.log(jsVar);

/*
---------- Tropa ----------
*/

function Tropa(precio, cantidad) {
    //Propiedades
    this.precio = precio;
    this.cantidad = cantidad;

    Object.defineProperty(this, 'precio', {
        get: function () {
            return precio;
        },
        set: function (value) {
            precio = value;
        }
    });

    Object.defineProperty(this, 'cantidad', {
        get: function () {
            return cantidad;
        },
        set: function (value) {
            cantidad = value;
        }
    });
}

/** CREAR OBJETOS TROPAS */

let trampa = new Tropa(20, 0);
let campesino = new Tropa(100, 0);
let garrote = new Tropa(350, 0);
let espadaCorta = new Tropa(800, 0);
let escudero = new Tropa(1500, 0);
let lancero = new Tropa(2000, 0);
let hacha = new Tropa(3000, 0);
let caballero = new Tropa(5000, 0);
let hondero = new Tropa(1000, 0);
let arquero = new Tropa(5000, 0);
let ballestero = new Tropa(10000, 0);
let sacerdote = new Tropa(15000, 0);
let mago = new Tropa(30000, 0);
let catapulta = new Tropa(50000, 0);

/** AUTOCLICK */
setInterval(GolpePorSegundo, 1000);

/** FUNCIONES */

function GolpePorSegundo() {
    monedasTotal += monedasPorSegundo;
    document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
}

$('#fotoEnemigo').click(function () {
    monedasTotal += cantidad;
    document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
});

function monedasAdmin() {

    monedasTotal += 50000;
    document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
}

function MonedasPorSegundo() {

    monedasPorSegundo += trampa.cantidad;
    monedasPorSegundo += calcularDañoExponencial(campesino.cantidad, 5);
    monedasPorSegundo += calcularDañoExponencial(garrote.cantidad, 10);
    monedasPorSegundo += calcularDañoExponencial(espadaCorta.cantidad, 20);
    monedasPorSegundo += calcularDañoExponencial(escudero.cantidad, 40);
    monedasPorSegundo += calcularDañoExponencial(lancero.cantidad, 60);
    monedasPorSegundo += calcularDañoExponencial(hacha.cantidad, 80);
    monedasPorSegundo += calcularDañoExponencial(caballero.cantidad, 100);
    monedasPorSegundo += calcularDañoExponencial(hondero.cantidad, 30);
    monedasPorSegundo += calcularDañoExponencial(arquero.cantidad, 60);
    monedasPorSegundo += calcularDañoExponencial(ballestero.cantidad, 120);
    monedasPorSegundo += calcularDañoExponencial(sacerdote.cantidad, 200);
    monedasPorSegundo += calcularDañoExponencial(mago.cantidad, 500);
    monedasPorSegundo += calcularDañoExponencial(catapulta.cantidad, 1000);

    document.getElementById("monedasPorSegundo").innerHTML = monedasPorSegundo.toLocaleString();
}

$('#mejoraDaño').click(function () {
    if (mejorasDaño == 0) {

        if (monedasTotal >= mejoraDañoPrecio) {
            monedasTotal -= mejoraDañoPrecio;
            mejorasDaño++;
            cantidad = 2;
            mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 1.5);

            document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
            document.getElementById("precioMejoraDaño").innerHTML = mejoraDañoPrecio.toLocaleString();
            document.getElementById("dañoHeroe").innerHTML = mejorasDaño;
        }
    }
    else if (mejorasDaño >= 1) {

        if (monedasTotal >= mejoraDañoPrecio) {
            monedasTotal -= mejoraDañoPrecio;
            mejorasDaño++;
            cantidad = cantidad + 2;
            mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 2.5);

            document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
            document.getElementById("precioMejoraDaño").innerHTML = mejoraDañoPrecio.toLocaleString();
            document.getElementById("dañoHeroe").innerHTML = mejorasDaño;
        }
    } else if (mejorasDaño >= 25) {

        if (monedasTotal >= mejoraDañoPrecio) {
            monedasTotal -= mejoraDañoPrecio;
            mejorasDaño++;
            cantidad = cantidad + 5;
            console.log(cantidad);
            mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 3.5);

            document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
            document.getElementById("precioMejoraDaño").innerHTML = mejoraDañoPrecio.toLocaleString();
            document.getElementById("dañoHeroe").innerHTML = mejorasDaño;
        }
    } else if (mejorasDaño >= 100) {

        if (monedasTotal >= mejoraDañoPrecio) {
            monedasTotal -= mejoraDañoPrecio;
            mejorasDaño++;
            cantidad = cantidad + 10;
            console.log(cantidad);
            mejoraDañoPrecio = Math.round(mejoraDañoPrecio * 5);

            document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
            document.getElementById("precioMejoraDaño").innerHTML = mejoraDañoPrecio.toLocaleString();
            document.getElementById("dañoHeroe").innerHTML = mejorasDaño;
        }
    }
});



$('#comprarTrampa').click(function () {
    if (monedasTotal >= trampa.precio) {
        monedasTotal -= trampa.precio;
        trampa.cantidad++;
        precioFinal = calcularPrecioExponencial(trampa.cantidad);
        trampa.precio = Math.round(trampa.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioTrampa").innerHTML = trampa.precio.toLocaleString();
        document.getElementById("cantidadTrampas").innerHTML = trampa.cantidad;

        MonedasPorSegundo();
    }
});

$('#comprarCampesino').click(function () {
    if (monedasTotal >= campesino.precio) {
        monedasTotal -= campesino.precio;
        campesino.cantidad++;
        precioFinal = calcularPrecioExponencial(campesino.cantidad);
        campesino.precio = Math.round(campesino.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioCampesino").innerHTML = campesino.precio.toLocaleString();
        document.getElementById("cantidadCampesino").innerHTML = campesino.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(campesino.cantidad, "comprarGarrote");
        DesbloquearTropas(campesino.cantidad, "comprarHondero");

    }
});

$('#comprarGarrote').click(function () {
    if (monedasTotal >= garrote.precio) {
        monedasTotal -= garrote.precio;
        garrote.cantidad++;
        precioFinal = calcularPrecioExponencial(garrote.cantidad);
        garrote.precio = Math.round(garrote.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioGarrote").innerHTML = garrote.precio.toLocaleString();
        document.getElementById("cantidadGarrote").innerHTML = garrote.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(garrote.cantidad, "comprarEspadaCorta");
    }
});

$('#comprarEspadaCorta').click(function () {
    if (monedasTotal >= espadaCorta.precio) {
        monedasTotal -= espadaCorta.precio;
        espadaCorta.cantidad++;
        precioFinal = calcularPrecioExponencial(espadaCorta.cantidad);
        espadaCorta.precio = Math.round(espadaCorta.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioEspadaCorta").innerHTML = espadaCorta.precio.toLocaleString();
        document.getElementById("cantidadEspadaCorta").innerHTML = espadaCorta.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(espadaCorta.cantidad, "comprarEscudero");
    }
});

$('#comprarEscudero').click(function () {
    if (monedasTotal >= escudero.precio) {
        monedasTotal -= escudero.precio;
        escudero.cantidad++;
        precioFinal = calcularPrecioExponencial(escudero.cantidad);
        escudero.precio = Math.round(escudero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioEscudero").innerHTML = escudero.precio.toLocaleString();
        document.getElementById("cantidadEscudero").innerHTML = escudero.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(escudero.cantidad, "comprarLancero");
    }
});

$('#comprarLancero').click(function () {
    if (monedasTotal >= lancero.precio) {
        monedasTotal -= lancero.precio;
        lancero.cantidad++;
        precioFinal = calcularPrecioExponencial(lancero.cantidad);
        lancero.precio = Math.round(lancero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioLancero").innerHTML = lancero.precio.toLocaleString();
        document.getElementById("cantidadLancero").innerHTML = lancero.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(lancero.cantidad, "comprarHacha");
    }
});

$('#comprarHacha').click(function () {
    if (monedasTotal >= hacha.precio) {
        monedasTotal -= hacha.precio;
        hacha.cantidad++;
        precioFinal = calcularPrecioExponencial(hacha.cantidad);
        hacha.precio = Math.round(hacha.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioHacha").innerHTML = hacha.precio.toLocaleString();
        document.getElementById("cantidadHacha").innerHTML = hacha.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(hacha.cantidad, "comprarCaballero");
    }
});

$('#comprarCaballero').click(function () {
    if (monedasTotal >= caballero.precio) {
        monedasTotal -= caballero.precio;
        caballero.cantidad++;
        precioFinal = calcularPrecioExponencial(caballero.cantidad);
        caballero.precio = Math.round(caballero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioCaballero").innerHTML = caballero.precio.toLocaleString();
        document.getElementById("cantidadCaballero").innerHTML = caballero.cantidad;

        MonedasPorSegundo();
        if (ballestero.cantidad >= 10) {
            DesbloquearTropas(caballero.cantidad, "comprarSacerdote");
        }
    }
});

$('#comprarHondero').click(function () {
    if (monedasTotal >= hondero.precio) {
        monedasTotal -= hondero.precio;
        hondero.cantidad++;
        precioFinal = calcularPrecioExponencial(hondero.cantidad);
        hondero.precio = Math.round(hondero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioHondero").innerHTML = hondero.precio.toLocaleString();
        document.getElementById("cantidadHondero").innerHTML = hondero.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(hondero.cantidad, "comprarArquero");
    }
});

$('#comprarArquero').click(function () {
    if (monedasTotal >= arquero.precio) {
        monedasTotal -= arquero.precio;
        arquero.cantidad++;
        precioFinal = calcularPrecioExponencial(arquero.cantidad);
        arquero.precio = Math.round(arquero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioArquero").innerHTML = arquero.precio.toLocaleString();
        document.getElementById("cantidadArquero").innerHTML = arquero.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(arquero.cantidad, "comprarBallestero");
    }
});

$('#comprarBallestero').click(function () {
    if (monedasTotal >= ballestero.precio) {
        monedasTotal -= ballestero.precio;
        ballestero.cantidad++;
        precioFinal = calcularPrecioExponencial(ballestero.cantidad);
        ballestero.precio = Math.round(ballestero.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioBallestero").innerHTML = ballestero.precio.toLocaleString();
        document.getElementById("cantidadBallestero").innerHTML = ballestero.cantidad;

        MonedasPorSegundo();

        if (caballero.cantidad >= 10) {
            DesbloquearTropas(ballestero.cantidad, "comprarSacerdote");
        }
    }
});

$('#comprarSacerdote').click(function () {
    if (monedasTotal >= sacerdote.precio) {
        monedasTotal -= sacerdote.precio;
        sacerdote.cantidad++;
        precioFinal = calcularPrecioExponencial(sacerdote.cantidad);
        sacerdote.precio = Math.round(sacerdote.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioSacerdote").innerHTML = sacerdote.precio.toLocaleString();
        document.getElementById("cantidadSacerdote").innerHTML = sacerdote.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(sacerdote.cantidad, "comprarMago");
    }
});

$('#comprarMago').click(function () {
    if (monedasTotal >= mago.precio) {
        monedasTotal -= mago.precio;
        mago.cantidad++;
        precioFinal = calcularPrecioExponencial(mago.cantidad);
        mago.precio = Math.round(mago.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioMago").innerHTML = mago.precio.toLocaleString();
        document.getElementById("cantidadMago").innerHTML = mago.cantidad;

        MonedasPorSegundo();
        DesbloquearTropas(mago.cantidad, "comprarCatapulta");
    }
});

$('#comprarCatapulta').click(function () {
    if (monedasTotal >= catapulta.precio) {
        monedasTotal -= catapulta.precio;
        catapulta.cantidad++;
        precioFinal = calcularPrecioExponencial(catapulta.cantidad);
        catapulta.precio = Math.round(catapulta.precio * precioFinal);

        document.getElementById("monedasTotal").innerHTML = monedasTotal.toLocaleString();
        document.getElementById("precioCatapulta").innerHTML = catapulta.precio.toLocaleString();
        document.getElementById("cantidadCatapulta").innerHTML = catapulta.cantidad;

        MonedasPorSegundo();
    }
});

/** DAÑO EXPONENCIAL */

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

/** PRECIO EXPONENCIAL */

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

/** DESBLOQUEAR TROPAS */
function DesbloquearTropas(tropa, tropaDesbloquear) {

    if (tropa >= 10) {
        document.getElementById(tropaDesbloquear).disabled = false;
    }

}
