/** Muestra el aviso de la cookie politica de datos */
window.onload = (event) => {
    let myAlert = document.querySelector('.toast');
    let bsAlert = new bootstrap.Toast(myAlert);
    bsAlert.show();
}