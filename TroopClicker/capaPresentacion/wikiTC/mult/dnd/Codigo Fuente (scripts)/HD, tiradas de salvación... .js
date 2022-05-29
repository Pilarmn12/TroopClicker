var str = this.getField("STRsavePROF");
var dex = this.getField("DEXsavePROF");
var con = this.getField("CONsavePROF");
var int = this.getField("INTsavePROF");
var sab = this.getField("WISsavePROF");
var car = this.getField("CHAsavePROF");

var lvl = this.getField("Lvl");
var hd = this.getField("HitDiceTotal");

var arm = this.getField("Armor");
var armm = this.getField("ACworn");

var dexb = this.getField("DEXbonus");
var conb = this.getField("CONbonus");
var sabb = this.getField("WISbonus");

var spe = this.getField("Speed");

if (clase.value == "Bárbaro") {
    if (arm.value == "") {
        armm.value = 10 + dexb.value + conb.value;
        if (this.getField("shieldyes").isBoxChecked(0)) {
            armm.value = armm.value + 2;
        }
    }
    hd.value = lvl.value + "d12";
    dex.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    str.value = "Yes";
    con.value = "Yes";
}
if (clase.value == "Bardo") {
    hd.value = lvl.value + "d8";
    str.value = "Off";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    dex.value = "Yes";
    car.value = "Yes";
}
if (clase.value == "Brujo") {
    hd.value = lvl.value + "d8";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Yes";
    car.value = "Yes";
}
if (clase.value == "Clérigo") {
    hd.value = lvl.value + "d8";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Yes";
    car.value = "Yes";
}
if (clase.value == "Druida") {
    hd.value = lvl.value + "d8";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    car.value = "Off";
    int.value = "Yes";
    sab.value = "Yes";
}
if (clase.value == "Explorador") {
    hd.value = lvl.value + "d10";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    str.value = "Yes";
    dex.value = "Yes";
}
if (clase.value == "Guerrero") {
    hd.value = lvl.value + "d10";
    dex.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    str.value = "Yes";
    con.value = "Yes";
}
if (clase.value == "Hechicero") {
    hd.value = lvl.value + "d6";
    str.value = "Off";
    dex.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    con.value = "Yes";
    car.value = "Yes";
}
if (clase.value == "Mago") {
    hd.value = lvl.value + "d6";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    car.value = "Off";
    int.value = "Yes";
    sab.value = "Yes";
}
if (clase.value == "Monje") {
    hd.value = lvl.value + "d8";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    str.value = "Yes";
    dex.value = "Yes";
    if (arm.value == "") {
        armm.value = 10 + conb.value + sabb.value;
        if (this.getField("shieldyes").isBoxChecked(0)) {
            armm.value = armm.value + 2;
        }
    }
    if (lvl.value == "1") {
        if (arm.value == "") {
            spe.value += 10;
        }
    }
    if (lvl.value == "2") {
        if (arm.value == "") {
            spe.value += 10;
        }
    }
    if (lvl.value == "3") {
        if (arm.value == "") {
            spe.value += 10;
        }
    }
    if (lvl.value == "4") {
        if (arm.value == "") {
            spe.value += 10;
        }
    }
    if (lvl.value == "5") {
        if (arm.value == "") {
            spe.value += 10;
        }
    }
    if (lvl.value == "6") {
        if (arm.value == "") {
            spe.value += 15;
        }
    }
    if (lvl.value == "7") {
        if (arm.value == "") {
            spe.value += 15;
        }
    }
    if (lvl.value == "8") {
        if (arm.value == "") {
            spe.value += 15;
        }
    }
    if (lvl.value == "9") {
        if (arm.value == "") {
            spe.value += 15;
        }
    }
    if (lvl.value == "10") {
        if (arm.value == "") {
            spe.value += 20;
        }
    }
    if (lvl.value == "11") {
        if (arm.value == "") {
            spe.value += 20;
        }
    }
    if (lvl.value == "12") {
        if (arm.value == "") {
            spe.value += 20;
        }
    }
    if (lvl.value == "13") {
        if (arm.value == "") {
            spe.value += 20;
        }
    }
    if (lvl.value == "14") {
        if (arm.value == "") {
            spe.value += 25;
        }
    }
    if (lvl.value == "15") {
        if (arm.value == "") {
            spe.value += 25;
        }
    }
    if (lvl.value == "16") {
        if (arm.value == "") {
            spe.value += 25;
        }
    }
    if (lvl.value == "17") {
        if (arm.value == "") {
            spe.value += 25;
        }
    }
    if (lvl.value == "18") {
       if (arm.value == "") {
           spe.value += 30;
        }
    }
    if (lvl.value == "19") {
        if (arm.value == "") {
            spe.value += 30;
        }
    }
    if (lvl.value >= "20") {
        if (arm.value == "") {
           spe.value += 30;
        }
    }
}
if (clase.value == "Paladín") {
    hd.value = lvl.value + "d10";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    sab.value = "Yes";
    car.value = "Yes";
}
if (clase.value == "Pícaro") {
    hd.value = lvl.value + "d8";
    str.value = "Off";
    con.value = "Off";
    sab.value = "Off";
    car.value = "Off";
    dex.value = "Yes";
    int.value = "Yes";
}
if (clase.value == "") {
    hd.value = "";
    str.value = "Off";
    dex.value = "Off";
    con.value = "Off";
    int.value = "Off";
    sab.value = "Off";
    car.value = "Off";
}