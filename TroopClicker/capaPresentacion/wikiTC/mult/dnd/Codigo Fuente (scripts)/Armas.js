var weapons = this.getField("Attack1");
var bonus = this.getField("AtkBonus1");
var damage = this.getField("Damage1");
var competence = this.getField("ProfBonus");
var STR = this.getField("STRbonus");
var DEX = this.getField("DEXbonus");

if(DEX.value > 0){
     var rc = "+";
}
if(STR.value > 0){
     var dr = "+";
}
if(DEX.value < 0){
     var rc = "";
}
if(STR.value < 0){
     var dr = "";
}

// Armas cuerpo a cuerpo

if(weapons.value == "Alabarda"){
     damage.value = "1d10" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d10";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Bastón"){
     damage.value = "1d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Espada larga"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Espadón"){
     damage.value = "2d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "2d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Flagelo"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Garrote"){
     damage.value = "1d4" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d4";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Garrote grande"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Guja"){
     damage.value = "1d10" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d10";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Hoz"){
     damage.value = "1d4" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d4";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Hacha de mano"){
     damage.value = "1d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Hacha de guerra"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Hacha a dos manos"){
     damage.value = "1d12" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d12";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Jabalina"){
     damage.value = "1d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Lanza"){
     damage.value = "1d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Lanza de caballería"){
     damage.value = "1d12" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d12";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Lucero del alba"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Maza"){
     damage.value = "1d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Maza a dos manos"){
     damage.value = "2d6" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "2d6";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Martillo ligero"){
     damage.value = "1d4" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d4";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Martillo de guerra"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Pica"){
     damage.value = "1d10" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d10";
     }
     bonus.value = competence.value + STR.value;
}
if(weapons.value == "Pico de guerra"){
     damage.value = "1d8" + dr + STR.value;
     if(STR.value == 0){
          damage.value = "1d8";
     }     
     bonus.value = competence.value + STR.value;
}

//Armas cuerpo a cuerpo sutiles

if(weapons.value == "Cimitarra"){
     if(DEX.value > STR.value){
          damage.value = "1d6" + rc +  DEX.value;
          if(DEX.value == 0){
               damage.value = "1d6";
          }
          bonus.value = competence.value + DEX.value;
     }else{
          damage.value = "1d6" + dr + STR.value;
          if(STR.value == 0){
               damage.value = "1d6";
          }
          bonus.value = competence.value + STR.value;
     }
}
if(weapons.value == "Daga"){
     if(DEX.value > STR.value){
          damage.value = "1d4" + rc + DEX.value;
          if(DEX.value == 0){
               damage.value = "1d4";
          }
          bonus.value = competence.value + DEX.value;
     }else{
          damage.value = "1d4" + dr + STR.value;
          if(STR.value == 0){
               damage.value = "1d4";
          }
          bonus.value = competence.value + STR.value;
     }
}
if(weapons.value == "Estoque"){
     if(DEX.value > STR.value){
          damage.value = "1d8" + rc + DEX.value;
          if(DEX.value == 0){
               damage.value = "1d8";
          }
          bonus.value = competence.value + DEX.value;
     }else{
          damage.value = "1d8" + dr + STR.value;
          if(STR.value == 0){
               damage.value = "1d8";
          }
          bonus.value = competence.value + STR.value;
     }
}
if(weapons.value == "Espada corta"){
     if(DEX.value > STR.value){
          damage.value = "1d6" + rc + DEX.value;
          if(DEX.value == 0){
               damage.value = "1d6";
          }
          bonus.value = competence.value + DEX.value;
     }else{
          damage.value = "1d6" + dr + STR.value;
          if(STR.value == 0){
               damage.value = "1d6";
          }
          bonus.value = competence.value + STR.value;
     }
}
if(weapons.value == "Látigo"){
     if(DEX.value > STR.value){
          damage.value = "1d4" + rc + DEX.value;
          if(DEX.value == 0){
               damage.value = "1d4";
          }
          bonus.value = competence.value + DEX.value;
     }else{
          damage.value = "1d4" + dr + STR.value;
          if(STR.value == 0){
               damage.value = "1d4";
          }
          bonus.value = competence.value + STR.value;
     }
}

//Armas a distancia

if(weapons.value == "Arco corto"){
     damage.value = "1d6" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Arco largo"){
     damage.value = "1d8" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Ballesta ligera"){
     damage.value = "1d8" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d8";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Ballesta de mano"){
     damage.value = "1d6" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d6";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Ballesta pesada"){
     damage.value = "1d10" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d10";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Cerbatana"){
     damage.value = "1d4" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d4";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == "Honda"){
     damage.value = "1d4" + rc + DEX.value;
     if(DEX.value == 0){
          damage.value = "1d4";
     }
     bonus.value = competence.value + DEX.value;
}
if(weapons.value == ""){
     damage.value = "";
     bonus.value = "";
}