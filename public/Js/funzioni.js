function cambioForm(select) {
    var selettore = document.getElementById(select);
    var app = document.getElementById("appartamento").style;
    var pl = document.getElementById("postoLetto").style;
    
    var servicesApp = document.getElementById("servApp").style;
    var servicesPl = document.getElementById("servPostoLetto").style;

    if (selettore.value === "0") {
        app.display = "block";
        pl.display = "none";
        
        servicesApp.display = "block";
        servicesPl.display = "none";

    }
    if (selettore.value === "1") {
        pl.display = "block";
        app.display = "none";
        
        servicesPl.display = "block";
        servicesApp.display = "none";
    }
    if (selettore.value === "2") {
        pl.display = "block";
        app.display = "block";
        
        servicesPl.display = "block";
        servicesApp.display = "block";
    }
}
;
function toggleMenu(currMenu) {
    var thisMenu = document.getElementById(currMenu).style;
    if (thisMenu.display === "block") {
        thisMenu.display = "none";
    } else {
        thisMenu.display = "block";
    }
}
