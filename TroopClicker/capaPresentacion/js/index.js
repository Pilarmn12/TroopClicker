/*
 ---------- Mostrar Datos Usuario ----------
 */
document.getElementById("botonMostrarDatos").addEventListener("click", mostrarDatos);


function mostrarDatos() {
    let x = document.getElementById('ValidarDatosUsuario');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }

}