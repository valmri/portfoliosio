<?php
require_once '../../../modele/manager/ManagerPrincipal.php';

// Récupération des données
$typeFichier = $_FILES['image']['type'];
$erreurFichier = $_FILES['image']['error'];
$tailleFichier = $_FILES['image']['size'];
$uploadLogo = false;

if($typeFichier === "image/jpeg" || $typeFichier === "image/png") {

    if ($erreurFichier === 0 && $tailleFichier <= 1000000) {

        $uploadLogo = true;

    } else {

        $msgErreur = "Logo trop lourd !";

    }

} else {

    $msgErreur = "Format du logo non autorisé !";

}

// Chemin d'upload
$_FILES['image']['name'] = date('dmYYYHms');
$uploadImage = '../../../assets/img/projets/'.basename($_FILES['image']['name']);


// Téléversement
if($uploadLogo) {

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadImage)) {

        $uploadSucces = true;

    }

} else {
    $uploadSucces = false;
}

// Création du fichier XML
header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<resultat>';

if($uploadSucces) {


    echo '<name>'. basename($_FILES['image']['name']) .'</name>';
    echo '<reponse>'. $uploadSucces .'</reponse>';


} else {

    echo '<reponse>'. $uploadSucces .'</reponse>';

}

echo '</resultat>';
