window.addEventListener('load', function () {

    /*Funzione responsabile della comparsa e scomparsa del menù a tendina quando la larghezza della pagina va sotto 800 pixel*/
    document.getElementById("buttonMenu").onclick = function () {
        var thisMenu = document.getElementById("tmNavbar").style;
        if (thisMenu.display === "block") {
            thisMenu.display = "none";
        } else {
            thisMenu.display = "block";
        }
    };
});