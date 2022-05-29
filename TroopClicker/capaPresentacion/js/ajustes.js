$(document).ready(function () {
    /** PROGRESS BAR **/
    $('.progress-value > span').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    /** CARGAMOS EL FONDO DEL USUARIO (ALMACENADO EN LA COOKIE) */
    let cookie = getCookie("fondo");
    if (cookie == "dia") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background1.png')";
    } else if (cookie == "tarde") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background2.png')";
    } else if (cookie == "noche") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background3.png')";
    }
});

/** Alerta de conexion (visitas) */
$('#conexion').fadeIn();
setTimeout(function () {
    $("#conexion").fadeOut();
}, 5000);

/*
 ---------- Funcion Cambiar Fondo desde Ajustes ----------
*/
$('#selectFondo').change(function () {
    let option = document.getElementById("selectFondo").value;
    if (option == "dia") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background1.png')";
        document.cookie = "fondo=dia";
    } else if (option == "tarde") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background2.png')";
        document.cookie = "fondo=tarde";
    } else if (option == "noche") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background3.png')";
        document.cookie = "fondo=noche";
    }
})

/** Funcion para buscar una cookie especifica que se envia por parametro */
function getCookie(fondo) {
    let cookieArray = document.cookie.split(";");
    /** Leemos las cookies */
    for (let i = 0; i < cookieArray.length; i++) {
        let cookieBuscada = cookieArray[i].split("=");
        /** Si la encontramos usamos trim para sanearlo y quitar caracteres que no queremos */
        if (fondo == cookieBuscada[0].trim()) {
            /** Devolvemos el value de la cookie buscada */
            return cookieBuscada[1];
        }
    }
    return null;
}