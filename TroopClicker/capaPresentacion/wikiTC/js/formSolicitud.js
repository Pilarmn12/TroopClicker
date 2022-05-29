// Creo un array con todos los input del formulario
let inputs = [$('#fname')[0], $('#lname')[0], $('#email')[0], $('#tlf')[0],
$('#fecha')[0], $('#localidad')[0], $('#formacion')[0], $('#experiencia')[0],
$('#lugarTrabajo')[0], $('#datosInteres')[0]]

/** Validacion del input Nombre */
$('#fname').blur(function () {
    if (inputs[0].value == "") {
        inputs[0].style.borderColor = "red";
    } else {
        inputs[0].style.borderColor = "green";
    }
});
/** Validacion del input Apellido */
$('#lname').blur(function () {
    if (inputs[1].value == "") {
        inputs[1].style.borderColor = "red";
    } else {
        inputs[1].style.borderColor = "green";
    }
});
/** Validacion del input Email */
$('#email').blur(function () {
    if (inputs[2].value == "") {
        inputs[2].style.borderColor = "red";
    } else {
        if (inputs[2].value.match(/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/g)) {
            inputs[2].style.borderColor = "green";
        } else {
            inputs[2].style.borderColor = "red";
        }
    }
});
/** Validacion del input Telefono */
$('#tlf').blur(function () {
    if (inputs[3].value == "") {
        inputs[3].style.borderColor = "red";
    } else {
        if (inputs[3].value.match(/^([6-9]{1})([0-9]{8})$/g)) {
            inputs[3].style.borderColor = "green";
        } else {
            inputs[3].style.borderColor = "red";
        }
    }
});
/** Validacion del input Fecha de nacimiento */
$('#fecha').blur(function () {
    if (inputs[4].value == "") {
        inputs[4].style.borderColor = "red";
    } else {
        if (inputs[4].value >= "2004-01-01") {
            inputs[4].style.borderColor = "red";
        } else {
            inputs[4].style.borderColor = "green";
        }
    }
});
/** Validacion del input Localidad */
$('#localidad').blur(function () {
    if (inputs[5].value == "") {
        inputs[5].style.borderColor = "red";
    } else {
        inputs[5].style.borderColor = "green";
    }
});
/** Validacion del input Formacion */
$('#formacion').blur(function () {
    if (inputs[6].value == "") {
        inputs[6].style.borderColor = "red";
    } else {
        inputs[6].style.borderColor = "green";
    }
});
/** Validacion del input Experiencia */
$('#experiencia').blur(function () {
    if (inputs[7].value == "") {
        inputs[7].style.borderColor = "red";
    } else {
        inputs[7].style.borderColor = "green";
    }
});
/** Validacion del input Lugar */
$('#lugarTrabajo').blur(function () {
    if (inputs[8].value == "") {
        inputs[8].style.borderColor = "red";
    } else {
        inputs[8].style.borderColor = "green";
    }
});
/** Validacion del input Datos Interes */
$('#datosInteres').blur(function () {
    if (inputs[9].value == "") {
        inputs[9].style.borderColor = "red";
    } else {
        inputs[9].style.borderColor = "green";
    }
});

/** Validacion de todos los inputs al intentar enviar el formulario.*/
$('#submit').click(function () {
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "") {
            inputs[i].style.borderColor = "red";
        } else {
            inputs[i].style.borderColor = "green";
        }
    }
});