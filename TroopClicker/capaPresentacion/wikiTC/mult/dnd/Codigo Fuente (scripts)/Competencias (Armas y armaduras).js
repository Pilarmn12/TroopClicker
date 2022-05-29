var clase = this.getField("Clase");
var race = this.getField("Race");
var pro = this.getField("ProfsLangs");

if (clase.value == "Bárbaro") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas y marciales \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias , escudos";
}
if (clase.value == "Bardo") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, ballestas de mano, espadas cortas, espadas largas y estoques\n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, ballestas de mano, espadas cortas, espadas largas, estoques, hachas de guerra y martillos de guerra\n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
}
if (clase.value == "Brujo") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, hachas de guerra y martillos de guerra \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas, espadas largas, y arcos largos \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, estoques, espadas cortas y ballestas de mano \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
}
if (clase.value == "Clérigo") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias, escudos";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, hachas de guerra y martillos de guerra \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias, escudos";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas, espadas largas y arcos largos \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias, escudos";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, estoques, espadas cortas y ballestas de mano \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias, escudos";
    }
}
if (clase.value == "Druida") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Garrotes, dagas, dardos, jabalinas, mazas, bastones, cimitarras, hoces, hondas y lanzas \n\n                Armaduras   \n-----------------------------------------\n- Ligeras, medias y escudos, aunque los druidas nunca llevan armaduras ni escudos hechos de metal";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Garrotes, dagas, dardos, jabalinas, mazas, bastones, cimitarras, hoces, hondas, lanzas, hachas de guerra, hachas de mano, martillos de guerra y martillos ligeros \n\n                Armaduras   \n-----------------------------------------\n- Ligeras, medias y escudos, aunque los druidas nunca llevan armaduras ni escudos hechos de metal";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Garrotes, dagas, dardos, jabalinas, mazas, bastones, cimitarras, hoces, hondas, lanzas, espadas cortas, espadas largas, arcos cortos y arcos largos \n\n                Armaduras   \n-----------------------------------------\n- Ligeras, medias y escudos, aunque los druidas nunca llevan armaduras ni escudos hechos de metal";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Garrotes, dagas, dardos, jabalinas, mazas, bastones, cimitarras, hoces, hondas, lanzas, estoques, espadas cortas y ballestas de mano \n\n                Armaduras   \n-----------------------------------------\n- Ligeras, medias y escudos, aunque los druidas nunca llevan armaduras ni escudos hechos de metal";
    }
}
if (clase.value == "Explorador") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas y marciales \n\n                Armaduras   \n-----------------------------------------\n- Ligeras y medias, escudos";
}
if (clase.value == "Guerrero") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas y marciales\n\n                Armaduras   \n-----------------------------------------\n- Todas las armaduras y escudos";
}
if (clase.value == "Hechicero") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones y ballestas ligeras";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones y ballestas ligeras, hachas de guerra, hachas de mano, martillos de guerra y martillos ligeros";
    }
    if (race.value == "Elfo de los Bosques" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones, ballestas ligeras, espadas cortas, espadas largas, arcos cortos y arcos largos";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones, ballestas ligeras, estoques, espadas cortas y ballestas de mano";
    }
}
if (clase.value == "Mago") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones y ballestas ligeras";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones, ballestas ligeras, hachas de guerra, hachas de mano, martillos de guerra y martillos ligeros";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones, ballestas ligeras, espadas cortas, espadas largas, arcos cortos y arcos largos";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Dagas, dardos, hondas, bastones, ballestas ligeras, estoques, espadas cortas y ballestas de mano";
    }
}
if (clase.value == "Monje") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas";
    if (race.value == "Enano de las Montañas" || race.value == "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas, hachas de guerra y martillos de guerra";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas, espadas largas y arcos largos";
    }
    if (race.value == "Elfo Ocuros") {
        pro.value = "                    Armas   \n-----------------------------------------\n- Sencillas, espadas cortas, estoques y ballestas de mano";
    }
}
if (clase.value == "Paladín") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, marciales\n\n                Armaduras   \n-----------------------------------------\n- Todas las armaduras y escudos";
}
if (clase.value == "Pícaro") {
    pro.value = "";
    pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, ballestas de mano, espadas cortas, espadas largas y estoques \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    if (race.value == "Enano de las Montañas" || race.value ==  "Enano de las Colinas") {
        pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, ballestas de mano, espadas cortas, espadas largas, estoques, hachas de guerra y martillos de guerra \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
    if (race.value == "Alto Elfo" || race.value == "Elfo de los Bosques") {
        pro.value = "                    Armas   \n-----------------------------------------\n- sencillas, ballestas de mano, arcos largos, espadas cortas, espadas largas y estoques \n\n                Armaduras   \n-----------------------------------------\n- Ligeras";
    }
}
if (clase.value == "" && race.value == "") {
    pro.value = ""
}