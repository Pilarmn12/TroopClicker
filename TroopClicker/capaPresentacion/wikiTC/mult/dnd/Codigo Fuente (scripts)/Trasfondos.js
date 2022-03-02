var tras = this.getField("Background");

var rel = this.getField("religPROF");
var ins = this.getField("insightPROF");
var atl = this.getField("athPROF");
var car = this.getField("arcanaPROF");
var eng = this.getField("decepPROF");
var his = this.getField("histPROF");
var inti = this.getField("intimPROF");
var jdm = this.getField("sohPROF");
var med = this.getField("medPROF");
var per = this.getField("perPROF");
var pers = this.getField("persPROF");
var sig = this.getField("stealthPROF");
var sup = this.getField("survPROF");
var tca = this.getField("anhanPROF");

if(tras.value == "Acólito"){
     rel.value = "Yes";
     ins.value = "Yes";
}
if(tras.value == "Animador"){
     atl.value = "Yes";
     inti.value = "Yes";
}
if(tras.value == "Artesano Gremial"){
     per.value = "Yes";
     pers.value = "Yes";
}
if(tras.value == "Charlatán"){
     jdm.value = "Yes";
     eng.value = "Yes";
}
if(tras.value == "Criminal"){
     eng.value = "Yes";
     sig.value = "Yes";
}
if(tras.value == "Ermitaño"){
     med.value = "Yes";
     rel.value = "Yes";
}
if(tras.value == "Erudito"){
     car.value = "Yes";
     his.value = "Yes";
}
if(tras.value == "Héroe del Pueblo"){
     sup.value = "Yes";
     tca.value = "Yes";
}
if(tras.value == "Huérfano"){
     jdm.value = "Yes";
     sig.value = "Yes";
}
if(tras.value == "Marinero"){
     atl.value = "Yes";
     per.value = "Yes";
}
if(tras.value == "Noble"){
     his.value = "Yes";
     pers.value = "Yes";
}
if(tras.value == "Salvaje"){
     sup.value = "Yes";
     atl.value = "Yes";
}
if(tras.value == "Soldado"){
     atl.value = "Yes";
     inti.value = "Yes";
}
if(tras.value == ""){
     rel.value = "Off";
     ins.value = "Off";
     atl.value = "Off";
     car.value = "Off";
     eng.value = "Off";
     his.value = "Off";
     inti.value = "Off";
     jdm.value = "Off";
     med.value = "Off";
     per.value = "Off";
     pers.value = "Off";
     sig.value = "Off";
     sup.value = "Off";
     tca.value = "Off";
}