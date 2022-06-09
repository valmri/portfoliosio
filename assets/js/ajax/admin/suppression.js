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

function suppression(id, type) {

    Swal.fire({
        title: 'Êtes-vous sûre de vouloir supprimer le contenu n°'+id+' ?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Annuler',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Supprimer'
    }).then((result) => {

        if (result.isConfirmed) {

            var requeteHTTP = getRequeteHttp();

            if (requeteHTTP == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Impossible d\'utiliser la technologie Ajax sur ce navigateur.'
                })

            } else {
                requeteHTTP.open("POST", "./controleur/admin/php-xml/suppression.php");

                requeteHTTP.onreadystatechange = function () {
                    suppressionResultat(requeteHTTP);
                };

                requeteHTTP.setRequestHeader(
                    "Content-Type",
                    "application/x-www-form-urlencoded"
                );
                requeteHTTP.send("id="+encodeURI(id)+"&type="+encodeURI(type));
            }

            Swal.fire(
                'Suppression effectuée avec succès !'
            );

        }
    })



}

function suppressionResultat(requeteHttp) {

    if (requeteHttp.readyState == 4) {

        if (requeteHttp.status == 200) {

            // Récupération des données
            let donnees = requeteHttp.responseXML.childNodes.item('resultat');

            let id = donnees.childNodes.item(0).childNodes.item(0).data;
            let reponse = donnees.childNodes.item(1).childNodes.item(0).data;

            // Suppression de l'élément concerné
            if(reponse === '1') {

                // Récupérer la ligne du tableau à supprimer en fonction de l'ID du contenu
                let tableau = document.getElementById('tableauGestion');

                // rechercher
                let nbLigne = tableau.childNodes.item(3).childElementCount;
                let compteur = 1;
                let trouve = false;

                while(compteur < nbLigne*2 && !trouve) {

                    if(tableau.childNodes.item(3).childNodes.item(compteur).childNodes.item(1).childNodes.item(0) !== null) {

                        let idCherche = tableau.childNodes.item(3).childNodes.item(compteur).childNodes.item(1).childNodes.item(0).data;

                        if(idCherche === id) {
                            var laLigne = tableau.childNodes.item(3).childNodes.item(compteur);
                            trouve = true;
                        }

                    }

                    compteur += 2;

                }

                const nbCase = laLigne.childElementCount;
                for(let i = 0; i < nbCase; i++) {
                    laLigne.deleteCell(0);
                }

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Échec de la suppression.'
                })
            }

        }

    }

}