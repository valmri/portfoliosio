function getRequeteHttp() {
    var requeteHttp;
    if (window.XMLHttpRequest) {
        // Mozilla
        requeteHttp = new XMLHttpRequest();
        if (requeteHttp.overrideMimeType) {
            // Problème Mozilla
            requeteHttp.overrideMimeType("text/xml");
        }
    } else {
        if (window.ActiveXObject) {
            // Internet explorer < IE7
            try {
                requeteHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    requeteHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    requeteHttp = null;
                }
            }
        }
    }
    return requeteHttp;
}

var getCompetences = function(idProjet) {
    var requeteHTTP = getRequeteHttp();

    if (requeteHTTP == null) {
        alert("Impossible d'utiliser la technologie Ajax sur ce navigateur.");
    } else {
        requeteHTTP.open("POST", "./controleur/admin/php-xml/competences.php");

        requeteHTTP.onreadystatechange = function () {
            afficherGetCompetence(requeteHTTP);
        };

        requeteHTTP.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        requeteHTTP.send("idProjet="+encodeURI(idProjet));
    }
}

function afficherGetCompetence(requeteHttp) {

    if (requeteHttp.readyState == 4) {
        if (requeteHttp.status == 200) {

            // Récupération des clients dans le fichier XML
            let donnees = requeteHttp.responseXML.childNodes.item('competence');

            // Création liste déroulante
            var listeCompetence = document.getElementById('competenceSelect');

            // Suppression des options dans la liste
            while (listeCompetence.firstChild) {
                listeCompetence.removeChild(listeCompetence.firstChild);
            }

            // Ajout des options dans la liste
            donnees.childNodes.forEach(competence => {

                let ancienElement = null;
                let idCompt = competence.childNodes.item(0).childNodes.item(0).data;
                let nomCompt = competence.childNodes.item(1).childNodes.item(0).data;

                let optionElement = document.createElement('option');
                optionElement.value = idCompt;
                optionElement.setAttribute('class','optionCompetence');
                optionElement.innerText = nomCompt;

                listeCompetence.insertBefore(optionElement, ancienElement);

                ancienElement = optionElement;

            });
        }
    }
}