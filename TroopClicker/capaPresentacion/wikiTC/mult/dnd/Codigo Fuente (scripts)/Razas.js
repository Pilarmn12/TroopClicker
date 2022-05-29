var race = this.getField("Race");
var speed = this.getField("Speed");
var rasgos = this.getField("FeaturesTraits");

var per = this.getField("perPROF");

if(race.value == "Enano de las Montañas"){
     rasgos.value = "";
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad\n- Afinidad con la Piedra\n- Resistencia Enana";
}
if(race.value == "Enano de las Colinas"){
     rasgos.value = "";
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad\n- Afinidad con la Piedra\n- Resistencia Enana";
}
if(race.value == "Gnomo de la Roca"){
     rasgos.value = "";
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Astucia Gnoma\n- Visión en la Oscuridad\n- Saber del Artificiero\n- Manitas";
}
if(race.value == "Gnomo del Bosque"){
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Astucia Gnoma\n- Visión en la Oscuridad\n- Hablar con las Bestezuelas\n- Ilusionista Innato";
}
if(race.value == "Mediano Fornido"){
     rasgos.value = "";
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Afortunado\n- Valiente\n- Agilidad de Mediano\n- Resistencia de Fornido";
}
if(race.value == "Mediano Piesligeros"){
     rasgos.value = "";
     speed.value = 25;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Afortunado\n- Valiente\n- Agilidad de Mediano\n- Sigiloso por Naturaleza";
}
if(race.value == "Semiorco"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad\n- Ataques Salvajes\n- Aguante Incansable\n- Amenazador";
}
if(race.value == "Tiflin"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Linaje Infernal\n- Resistencia Infernal\n- Visión en la Oscuridad";
}
if(race.value == "Dracónido"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Ataque de Aliento\n- Resistencia al Daño";
}
if(race.value == "Humano"){
     rasgos.value = "";
     speed.value = 30;
}
if(race.value == "Semielfo"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Versátil con Habilidades\n- Linaje Feérico\n- Visión en la Oscuridad";
}
if(race.value == "Elfo Oscuro"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad Superior\n- Linaje féerico\n- Trance\n- Sensibilidad a la Luz Solar";
     per.value = "Yes";
}
if(race.value == "Alto Elfo"){
     rasgos.value = "";
     speed.value = 30;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad\n- Linaje féerico\n- Trance";
     per.value = "Yes";
}
if(race.value == "Elfo de los Bosques"){
     rasgos.value = "";
     speed.value = 35;
     rasgos.value = "                   Rasgos              \n------------------------------------------\n- Visión en la Oscuridad\n- Linaje féerico\n- Trance\n- Máscara de la Naturaleza";
     per.value = "Yes";
}
if(race.value == ""){
     speed.value = "";
     rasgos.value = "";
     per.value = "off"
}