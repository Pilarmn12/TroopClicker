const btnModoOscuro = document.getElementById('btnModo');

btnModoOscuro.addEventListener('click', () => {
    document.body.classList.toggle('dark'); //toggle the HTML body the class 'dark'
    btnModoOscuro.classList.toggle('active');//toggle the HTML button with the id='switch' with the class 'active'
    cambiarMenuLateral();
});

function cambiarMenuLateral(){
    let menu = document.getElementById("menuLateral");
    if (menu.className == "col-auto col-md-3 col-xl-2 px-sm-2 px-0 border bg-light") {
        menu.className = "col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark";
    } else {
        menu.className = "col-auto col-md-3 col-xl-2 px-sm-2 px-0 border bg-light";
    }
}
