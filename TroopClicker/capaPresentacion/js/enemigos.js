/** Funcion para crear el color rgb de la barra de vida */
function tohex(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}
/** Array de enemigos */
let enemies = new Map([[1, "Fire Worm"], [2, "Ronin"], [3, "Samurai"]]);
let valHPmax = '100', porcentaje, intPorcentaje, expTotal, expEnemigo, expObjetivo, porcentajeExp, intPorcentajeExp;
let lvlMinEnemigo, lvlMaxEnemigo;
/** Cada click al enemigo le bajara 10 de vida hasta que llegue a 0, 
 * entonces se genera otro enemigo de forma aleatoria y regenera la vida */
$('#fotoEnemigo').click(function () {
    let valHP = $('#val1').val();
    valHP = valHP - 10;

    porcentaje = (valHP / valHPmax) * 100;
    intPorcentaje = Math.round(porcentaje);

    $('#bar1').css("width", intPorcentaje * 2.5 + "px");
    $('#bar1').css("backgroundColor", tohex(255 - (intPorcentaje * 2.5), intPorcentaje * 2.5, 0));
    $('#val1').attr("value", valHP);

    $('#valorRange').text(intPorcentaje);

    if (valHP <= 0) {
        /** 
         * Reinicio la barra de vida para el nuevo enemigo.
         *
         * Depende de la resolucion del navegador y monitor, la barra de vida puede tener problemas en la estetica.
         * El rectangulo con el color de la vida, sera mayor al area que deberia cubrir.
         */


        /** Numeros aleatorios para el enemigo y su nivel */
        lvlMinEnemigo = parseInt($('#nivelPersonaje').text());
        if (lvlMinEnemigo > 3) {
            lvlMinEnemigo = lvlMinEnemigo - 3;
        }
        lvlMaxEnemigo = lvlMinEnemigo + 15;

        let randomEnemy = Math.floor((Math.random() * (3 - 1 + 1)) + 1);
        let randomLvl = Math.floor((Math.random() * (lvlMaxEnemigo - lvlMinEnemigo + 1)) + lvlMinEnemigo);

        valHP = 100 + (10 * randomLvl);
        valHPmax = valHP;

        porcentaje = (valHP / valHPmax) * 100;
        intPorcentaje = Math.round(porcentaje);

        $('#bar1').css("width", intPorcentaje * 2.5 + "px");
        $('#bar1').css("backgroundColor", tohex(255 - (intPorcentaje * 2.5), intPorcentaje * 2.5, 0));
        $('#val1').attr("value", valHP);
        $('#valorRange').text(intPorcentaje);

        switch (enemies.get(randomEnemy)) {
            case 'Fire Worm':
                $('.enemyName').text('Fire Worm - lvl ' + randomLvl);
                $('#fotoEnemigo').css('background-image', 'url(./img/Enemigos/worm.png)');
                break;
            case 'Ronin':
                $('.enemyName').text('Ronin - lvl ' + randomLvl);
                $('#fotoEnemigo').css('background-image', 'url(./img/Enemigos/samurai.png)')
                break;
            case 'Samurai':
                $('.enemyName').text('Samurai - lvl ' + randomLvl);
                $('#fotoEnemigo').css('background-image', 'url(./img/Enemigos/samurai2.png)')
                break;
        }



        /** EXPERIENCIA POR ENEMIGO **/
        let lvlPj = parseInt($('#nivelPersonaje').text());
        expObjetivo = 100 * lvlPj;
        expTotal = 0;
        expTotal = parseInt($('#val2').val());
        //expVar2 = $('#val2').val();

        expEnemigo = (randomLvl * 3) / lvlPj;

        expTotal = expTotal + expEnemigo;

        porcentajeExp = (expTotal / expObjetivo) * 100;
        intPorcentajeExp = Math.round(porcentajeExp);
        console.log('Exp Obj:' + expObjetivo + 'Exp Total:' + expTotal + 'Exp Enemigo:' + expEnemigo);

        $('#bar2').css("height", intPorcentajeExp * 1 + "px");
        $('#bar2').css("backgroundColor", 'blue');
        $('#val2').attr("value", expTotal);
        $('#pocentExp').text(intPorcentajeExp);


        if (expTotal >= expObjetivo) {
            $('#valorExp').text(0);
            $('#val2').text(0);
            $('#nivelPersonaje').text(lvlPj + 1);
            $('#pocentExp').text(0);
            $('#bar2').css("height", 0 + "px");
            $('#val2').attr("value", 0);
        }


    }
});


// /* RECOGER VALOR RANGE Y MOSTRARLO */

// selectElement.addEventListener('change', (event) => {
//     let value = $('#val1').val();
//     document.getElementById('valorRange').innerHTML = value;
// });

