$(function () {
    var contractParagraph = document.getElementById('contractText');
    var accDetParagraph = document.getElementById('accomodationDetails');
    var studDetParagraph = document.getElementById('studentDetails');
    var locDetParagraph = document.getElementById('locatorDetails');
    
    var contractText = contractParagraph.innerHTML;
    var accDetails = accDetParagraph.innerHTML;
    var studDetails = studDetParagraph.innerHTML;
    var locDetails = locDetParagraph.innerHTML;
    
    var formattedBody = "Contratto\n" +
            contractText + "\n" +
            accDetails + "\n" +
            studDetails + "\n" +
            locDetails + "\n";
    
    var mailToLink = "?subject=FLAK - Assegnazione alloggio&" + "body=" + encodeURIComponent(formattedBody);
    var mailToAnchor = document.getElementById('mailto');
    mailToAnchor.href += mailToLink;
});