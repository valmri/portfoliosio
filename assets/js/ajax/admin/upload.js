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

function upload(image, type) {

    var requeteHTTP = getRequeteHttp();

    if (requeteHTTP == null) {
        Swal.fire({
            icon: 'error',
            title: 'Impossible d\'utiliser la technologie Ajax sur ce navigateur.'
        })

    } else {

        // Contrôle de l'image
        let typeFichier = image.files[0].type;
        let tailleFichier = image.files[0].size;

        if( typeFichier == "image/jpeg" || typeFichier == "image/png" ) {

            if( tailleFichier <= "1000000" ) {

                let formData = new FormData();

                formData.append('image', image.files[0], image.files[0].name);
                formData.append('type', type);

                // Préparation de la requête
                requeteHTTP.open("POST", "./controleur/admin/php-xml/upload.php", true);

                requeteHTTP.onreadystatechange = function () {
                    uploadResultat(requeteHTTP);
                };

                requeteHTTP.send(formData);

            } else {

                Swal.fire ({
                    icon: 'error',
                    title: 'Taille non autorisé.',
                    text: 'La taille de votre fichier doit être inférieure ou égale à 8MB.'
                })

            }

        } else {

            Swal.fire({
                icon: 'error',
                title: 'Format non autorisé.',
                text: 'Veuillez fournir une image au format png ou jpeg inférieur ou égal à 8MB.'
            })

        }

    }

}

function uploadResultat(requeteHttp) {

    if (requeteHttp.readyState == 4) {

        if (requeteHttp.status == 200) {

            // Récupération des données
            let donnees = requeteHttp.responseXML.childNodes.item('resultat');

            let nom = donnees.childNodes.item(0).childNodes.item(0).data;
            let type = donnees.childNodes.item(1).childNodes.item(0).data;
            let reponse = donnees.childNodes.item(2).childNodes.item(0).data;

            if(reponse === '1') {

                // Récupération des champs invisible
                if(type === 'logo') {
                    let nomImage = document.getElementById('logoProjet');
                    nomImage.value = nom;
                } else if(type === 'image') {
                    let nomImage = document.getElementById('imageProjet');
                    nomImage.value = nom;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Réussite !',
                    text: "L'image a été téléversé avec succès !"
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Attention !',
                    text: "Un problème a été rencontré lors du téléversement de l'image."
                })

            }


        }

    }

}