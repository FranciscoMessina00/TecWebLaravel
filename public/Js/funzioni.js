window.onload = function () {
    showSlides(1);
    /*Funzione responsabile della comparsa e scomparsa del menù a tendina quando la larghezza della pagina va sotto 800 pixel*/
    document.getElementById("buttonMenu").onclick = function () {
        var thisMenu = document.getElementById("tmNavbar").style;
        if (thisMenu.display === "block") {
            thisMenu.display = "none";
        } else {
            thisMenu.display = "block";
        }
    };
    /*Funzione responsabile nel far comparire elementi della form nei filtri del catalogo lato studente*/
    document.getElementById("tipo").onchange = function () {
        var selettore = document.getElementById("tipo");
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
    };
    
};

let slideIndex = 1;
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    
    let slides = document.getElementsByClassName("nascondi");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";

}
