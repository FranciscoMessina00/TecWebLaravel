function cambioForm(select) {
    var selettore = document.getElementById(select);
    var app = document.getElementById("appartamento").style;
    var pl = document.getElementById("postoLetto").style;

    if (selettore.value === "0") {
        app.display = "block";
        pl.display = "none";

    }
    if (selettore.value === "1") {
        pl.display = "block";
        app.display = "none";
    }
    if (selettore.value === "2") {
        pl.display = "block";
        app.display = "block";
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
