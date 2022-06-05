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
// slideshow locazioni
//let slideIndex1 = 1;
//
//
//// Next/previous controls
//function plusSlides1(n) {
//  showSlides1(slideIndex1 += n);
//}
//
//// Thumbnail image controls
//function currentSlide1(n) {
//  showSlides1(slideIndex1 = n);
//}
//
//function showSlides1(n) {
//  let i;
//  let slides1 = document.getElementsByClassName("nascondi");
//  let dots = document.getElementsByClassName("dot");
//  if (n > slides1.length) {slideIndex1 = 1}
//  if (n < 1) {slideIndex1 = slides1.length}
//  for (i = 0; i < slides1.length; i++) {
//    slides1[i].style.display = "none";
//  }
//  for (i = 0; i < dots.length; i++) {
//    dots[i].className = dots[i].className.replace(" active", "");
//  }
//  slides1[slideIndex1-1].style.display = "block";
//  dots[slideIndex1-1].className += " active";
//}