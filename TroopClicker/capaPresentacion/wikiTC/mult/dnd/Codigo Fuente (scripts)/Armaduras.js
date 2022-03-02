var armadura = this.getField("Armor");
var ca = this.getField("ACworn");
var dex = this.getField("DEXbonus");

if(armadura.value == "Armadura de bandas"){
     ca.value = 17;
}
if(armadura.value == "Armadura de placas"){
     ca.value = 18;
}
 if(armadura.value == "Cota de malla"){
     ca.value = 16;
}
if(armadura.value == "Cota guarnecida"){
     ca.value = 14;
}
if(armadura.value == "Acolchada"){
    ca.value = dex.value + 11;
}
if(armadura.value == "Cuero"){
     ca.value = dex.value + 11;
}
if(armadura.value == "Cuero tachonado"){
     ca.value = dex.value + 11;
}
if(armadura.value == "Camisa de malla"){
     ca.value = dex.value + 13;
     if(ca.value > 15){
          ca.value = 15;
     }
}
if(armadura.value == "Cota de escamas"){
      ca.value = dex.value + 14 ;
      if(ca.value > 16){
          ca.value = 16;
     }
}
if(armadura.value == "Coraza"){
      ca.value = dex.value + 14;
      if(ca.value > 16){
          ca.value = 16;
     }
}
if(armadura.value == "Media armadura"){
     ca.value = dex.value + 15;
     if(ca.value > 17){
          ca.value = 17;
     }
}
if(armadura.value == "Pieles"){
     ca.value = dex.value + 12;
     if(ca.value > 14){
          ca.value = 14;
     }
}

if(this.getField("shieldyes").isBoxChecked(0)){
     ca.value = ca.value + 2;
}

if(armadura.value == ""){
     ca.value = "";
}