/* EVENTOS */
document.getElementById("selectFondo").addEventListener('change', cambiarFondo);

/*
 ---------- Funcion Cambiar Fondo ----------
*/
function cambiarFondo() {
    let option = document.getElementById("selectFondo").value;
    if (option == "dia") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background1.png')";
    } else if (option == "tarde") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background2.png')";
    } else if (option == "noche") {
        document.body.style.backgroundImage = "url('./img/Fondo/backgrounds/background3.png')";
    }
}
